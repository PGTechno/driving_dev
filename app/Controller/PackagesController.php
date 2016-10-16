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
class PackagesController extends AppController {

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
        //$this->Auth->allow(array('admin_login', 'admin_logout'));
        //pr($this->Session->read('Auth.User'));exit;
    }

	
	public function admin_index($uid=""){
		$title_for_layout = "Packages";
		$this->set(compact('title_for_layout','uid'));
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
		      //pr($condition);
                       
            $total_records = $this->Package->find('count', array('conditions' => $condition));
            
            //$fields = array('User.id', 'User.fname', 'User.status', 'User.lname', 'User.email','User.dob','User.date_added');
            $userData = $this->Package->find('all', array(
                      'conditions' => $condition,
                      //'fields' => $fields,
                      'order' => $orderby,
                      'limit' => $limit,
                      'offset' => $start
                  ));

            //prd($userData);

            $return_result['draw'] = $page;
            $return_result['recordsTotal'] = $total_records;
            $return_result['recordsFiltered'] = $total_records;
            
    
            $return_result['data']=array();
            if (isset($userData[0])) {
             $i = $start + 1;
                foreach ($userData as $row) {
     
                 $action = '';
                 $status = $row['Package']['status']==0 ? "Inactive" : "Active" ;
                 $role  = $row['Trainer']['role'];

                 /*if ($row['User']['status']==0)
                 {
                  $status .= '<i class="fa fa-circle fa-lg clr-red" onclick="changeUserStatus(' . $row['User']['id'] . ',0)" title="Change Status"></i>';
                 }
                 else if ($row['User']['status']==1)
                 {
                  $status .= '<i class="fa fa-circle fa-lg clr-green" onclick="changeUserStatus(' . $row['User']['id'] . ',1)" title="Change Status"></i>';
                 }*/
                 
                 $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/packages/add_package/'.$row['Package']['user_id'].'/'.$row['Package']['id']. '" title="Edit Package"><i class="fa fa-edit fa-lg"></i></a> ';

                 //$action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/packages/index/'.$row['User']['id']. '" title="Packege Detail"><i class="fa fa-th-list fa-lg"></i></a> ';
                                
                 $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="change_status('.$row['Package']['id'].')" title="Delete Package"><i class="fa fa-trash fa-lg"></i></a>';                    
                 
                    
                    $return_result['data'][]= array(
                     $i,//$row['User']['id'],
                     $row['Package']['title'],
                     $row['Package']['duration'],
                     $row['Package']['price'],
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

	public function admin_add_package($uId=0,$packageId=0){
		$this->loadModel('User');
		$title_for_layout = "Add Package";
		$this->set(compact('title_for_layout','Add Package'));	
		$action = $packageId ? "Edited" : "Added";
		$isUserExist = $this->User->find('first',array('conditions'=>array('User.id'=>$uId)));
		if(empty($isUserExist)){ 
			$this->Session->setFlash("Sorry, Packages should be created under user",'error');
 			$this->redirect(array('full_base'=>true,'controller'=>'packages','action'=>'index'));
		}
		if($this->request->is('post') || $this->request->is('put')){
			$req = $this->request->data;

			$req['Package']['user_id'] = $uId;
			if($this->Package->save($req['Package'])){
 				$this->Session->setFlash("Package ".$action." Successfully",'success');
 				$this->redirect(array('full_base'=>true,'controller'=>'packages','action'=>'index',$uId));
			}else{
				$this->Session->setFlash("Sorry, Please try again",'error');	
			}
		}
		$timeOptions = $this->Custom->packageTimeInterval();
		$isExist = $this->Package->find('first',array('conditions'=>array('Package.id'=>$packageId)));
		$this->request->data = $isExist;
		//prd($isExist);
		$this->set(compact('uId','packageId','timeOptions'));
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
