<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class BookingsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function beforeFilter() {
        parent::beforeFilter();
    }

	
	public function admin_index($uid=0){
		$this->loadModel('User');
		$trainer = $this->User->findById($uid);
		$title_for_layout = "Bookings";
		$this->set(compact('title_for_layout','uid','trainer'));
	}

	public function admin_index_data($uid=0) {
		$request = $this->request;
        $this->autoRender = false;
        if ($request->is('ajax')) {
            $this->layout = 'ajax';
   			$page = $request->query('draw');
            $limit = $request->query('length');
            $start = $request->query('start');
            
            //for order
            $colName=$this->request->query['order'][0]['column'];
            $orderby[$this->request->query['columns'][$colName]['name']]=$this->request->query['order'][0]['dir'];
          
            $condition = array();
            $condition ['Package.user_id'] = $uid;
           	//pr($this->request->query['columns']);
		    foreach ($this->request->query['columns'] as $column){
		       if (isset($column['searchable']) && $column['searchable'] == 'true') {
		        if(isset($column['name']) && $column['search']['value']!='') {
		         $condition[$column['name'].' LIKE '] = '%' .trim($column['search']['value']). '%';
		        }
		       } 
		    }
		    
		    //pr($condition); exit;
                       
            $total_records = $this->Booking->find('count', array('conditions' => $condition));
            //$fields = array('User.id', 'User.fname', 'User.status', 'User.lname', 'User.email','User.dob','User.date_added');
            $bookingData = $this->Booking->find('all', array(
                      'conditions' => $condition,
                      //'fields' => $fields,
                      'order' => $orderby,
                      'limit' => $limit,
                      'offset' => $start
                  ));

            //prd($bookingData);

            $return_result['draw'] = $page;
            $return_result['recordsTotal'] = $total_records;
            $return_result['recordsFiltered'] = $total_records;
            
    
            $return_result['data']=array();
            if (isset($bookingData[0])) {
             $i = $start + 1;
                foreach ($bookingData as $row) {
     
                 $action = '';
                 $status = $row['Booking']['status']==0 ? "Inactive" : "Active" ;
                 
                 $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/bookings/add_booking/'.$uid.'/'.$row['Booking']['id']. '" title="Edit Package"><i class="fa fa-edit fa-lg"></i></a> ';

                 //$action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/packages/index/'.$row['User']['id']. '" title="Packege Detail"><i class="fa fa-th-list fa-lg"></i></a> ';
                                
                 $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="change_status('.$row['Booking']['id'].')" title="Delete Booking"><i class="fa fa-trash fa-lg"></i></a>';                    
                 
                    
                    $return_result['data'][]= array(
                     $i,//$row['User']['id'],
                     $row['Package']['title'],
                     $row['Package']['duration'],
                     $row['Booking']['booking_amount'],
                     $row['User']['fname'],
                     $row['Booking']['start_time'],
                     //date(Configure::read('Site.admin_date_format'), strtotime($row['User']['dob'])),
                    //date(Configure::read('Site.admin_date_time_format'), strtotime($row['User']['date_added'])),
                     $status,
                     $action 
                    );
                    $i++;
                }
            }
            //pr($return_result);
            echo json_encode($return_result);
            exit;
            
        } else {
            $this->set('title_for_layout',__('Access Denied'));
            $this->render('/nodirecturl');
        }
    }

	public function admin_add_booking($uId=0,$bId=0){
		$this->loadModel('User');
		$action = $bId ? "Edit" : "Add";
		$title_for_layout = $action." Booking";
		$this->set(compact('title_for_layout'));	
		$action = $bId ? "Edit" : "Add";
		$isUserExist = $this->User->find('first',array('conditions'=>array('User.id'=>$uId,'User.role'=>2)));
		//prd($isUserExist);
		if(empty($isUserExist)){ 
			$this->Session->setFlash("Sorry, Booking should be created under trainer.",'error');
 			$this->redirect(array('full_base'=>true,'controller'=>'booking','action'=>'index'));
		}
		
		
		$packageOptions = array();
		$userOptions = $this->User->find('list',array('conditions'=>array('User.role'=>3),'fields'=>array('id','email')));
		foreach($isUserExist['Package'] as $k=>$v){
			$packageOptions[$v['id']] = $v['title'];
		}
		
		if($this->request->is('post') || $this->request->is('put')){
			$req = $this->request->data;

			//$req['Package']['user_id'] = $uId;
			if($this->Booking->save($req['Booking'])){
 				$this->Session->setFlash("Booking ".$action." Successfully",'success');
 				$this->redirect(array('full_base'=>true,'controller'=>'bookings','action'=>'index',$uId));
			}else{
				$this->Session->setFlash("Sorry, Please try again",'error');	
			}
		}
		$isExist = $this->Booking->find('first',array('conditions'=>array('Booking.id'=>$bId)));
		$this->request->data = $isExist;
		//prd($isExist);
		$this->set(compact('uId','userOptions','packageOptions'));
	}

	public function admin_change_status(){
		if($this->request->is('ajax')){
			$req = $this->request->data;
			$this->loadModel($req['model']);
			$save[$req['model']]['id'] = $req['id'];
			$save[$req['model']][$req['field']] = $req['status'];
			if($this->$req['model'] ->save($save)){
				echo 1;
			}else{
				echo 0;
			}
			exit;
		}
	}

	public function admin_email_send($from="",$to="",$sub="",$temp_name='BACK_REGISTER',$lang="eng",$keyword=array("Ganpat","goyal@mailinator.com",'123456')){
		/*$this->loadModel('EmailTemplate');
		$content = $this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.title'=>$temp_name,'EmailTemplate.language'=>$lang)));
		if($content){
			$kword = explode(",",$content['EmailTemplate']['keyword']);
			$message =  str_replace($kword, $keyword, $content['EmailTemplate']['content']);
			//pr($message);exit;
			$Email = new CakeEmail();
			$Email->template('default', 'default')
			$Email->viewVars(array('message' => $message));
			$Email->sender($from, $sub);	
			    ->emailFormat('both')
			    ->to($to)
			    ->send();
		}*/
		//pr($content); exit;
	}

	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
