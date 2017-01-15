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

	public function index() {
        $this->layout = 'afterlogin';
        $this->loadModel('Booking');
        if ($this->request->is('ajax')) {
            $request = $this->request;
            $this->layout = 'ajax';
   			$page = $request->query('draw');
            $limit = $request->query('length');
            $start = $request->query('start');
            
            //for order
            $colName=$this->request->query['order'][0]['column'];
            $orderby[$this->request->query['columns'][$colName]['name']]=$this->request->query['order'][0]['dir'];
          
            $condition = array();
            //$condition ['Package.user_id ='] = $this->authData['id'];
            $condition ['Booking.status ='] = 1;
            //$condition ['Message.role !='] = 1;
           
            //pr($this->request->query['columns']);
		    foreach ($this->request->query['columns'] as $column){
		       if (isset($column['searchable']) && $column['searchable'] == 'true') {
		        	if(isset($column['name']) && $column['search']['value']!='') {
				         $condition[$column['name'].' LIKE '] = '%' .trim($column['search']['value']). '%';
				    }
			    } 
		    }
		    $total_records = $this->Booking->find('count', array('conditions' => $condition));
            
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
     
	                 $action = '<span class="label label-table label-success">ACCEPT</span><span class="label label-table label-danger">DECLINE</span>';
	                 /*$action = '';
	                 $status = '';
	                 $role = $row['User']['role']==2 ? "Instroctor" : "User" ;*/
	                 
	                 /*if ($row['User']['status']==0)
	                 {
	                  $status .= '<i class="fa fa-circle fa-lg clr-red" onclick="changeUserStatus(' . $row['User']['id'] . ',0)" title="Change Status"></i>';
	                 }
	                 else if ($row['User']['status']==1)
	                 {
	                  $status .= '<i class="fa fa-circle fa-lg clr-green" onclick="changeUserStatus(' . $row['User']['id'] . ',1)" title="Change Status"></i>';
	                 }*/
	                 
	                 /*$action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/users/add_user/'.$row['User']['id']. '" title="Edit User"><i class="fa fa-edit fa-lg"></i></a> ';

	                 $row['User']['role']==2 ? $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/packages/index/'.$row['User']['id']. '" title="Package Detail"><i class="fa fa-th-list fa-lg"></i></a> ' : "";
	                 $row['User']['role']==2 ? $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/bookings/index/'.$row['User']['id']. '" title="Booking Detail"><i class="fa fa-eye fa-lg"></i></a> ' : "";
	                                
	                 $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="change_status('.$row['User']['id'].')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';                    */
	                 $date = $this->Custom->dateFormatChange($row['Booking']['created'],$oldFormat="Y-m-d H:i:s",$newFormat="d/m/Y | H:i A");
                     $return_result['data'][]= array(
	                     $row['User']['fname'],
	                     $row['Package']['title'],
	                     $row['Package']['duration']." MINUTE",
	                     $date,
	                     $action
	                     //date(Configure::read('Site.admin_date_format'), strtotime($row['User']['dob'])),
	                    //date(Configure::read('Site.admin_date_time_format'), strtotime($row['User']['date_added'])),
	                     //$role,
	                     //$action 
                    );

                    $i++;
                }
            }
           // pr($return_result);
            echo json_encode($return_result);
            exit;
        }    
    }

	public function calendar() {
		$this->layout = 'afterlogin';
		$events = array(); 
		//$confition['Booking.id'] = $id;
		$confition['Package.user_id'] = $this->authData['id'];
		$confition['Booking.status'] = 1;
		$isExist = $this->Booking->find('all',array(
			'conditions'=>$confition
		));

		foreach($isExist as $k => $v){
			$events[] = array(
				'id' => $v['Booking']['id'],
				'title' => ucfirst($v['User']['fname']),//'<b>'.date('H:i A',strtotime($v['Booking']['start_time'])).'</b> '.ucfirst($v['User']['fname']),
				'start' => $v['Booking']['start_time'],
				'end' => $v['Booking']['end_time'],
				'className' => 'my_event',
				'color' => '#72c35d'
			);	
		}
		$events = json_encode($events);	
		$this->set(compact('events'));
	}

	public function add($id=1) {
		$this->layout = false;
		$res = array('err'=>1,'msg'=>'');
		$confition['Booking.id'] = $id;
		$confition['Package.user_id'] = $this->authData['id'];
		$isExist = $this->Booking->find('first',array(
			'conditions'=>$confition
		));
		
		
		if(empty($isExist)){
			$res['err'] = 1; $res['msg'] = 'Sorry,This bookingis not belongs to you.';
			echo json_encode($res,true); exit;
		}else if(!empty($this->request->data) ){
			$isExist['Booking']['start_time'] = $this->Custom->dateFormatChange($this->request->data['Booking']['start_time'],Configure::read('Site.front_date_time_format'),'Y-m-d H:i:s');
			$res = $this->Booking->isBookingConflict($isExist['Booking']);
			if($res['err']==1){

			}else{
				$save['Booking']['id'] = $this->request->data['Booking']['id'];
				$save['Booking']['start_time'] = $isExist['Booking']['start_time'];
				$save['Booking']['end_time'] = date('Y-m-d H:i:s',strtotime($isExist['Booking']['start_time']." +".$isExist['Package']['duration']." minutes"));
				//prd($save);
				if($this->Booking->save($save)){
					$res['err'] = 0; 
					$res['msg'] = 'Successfully updated schedule.';
					$res['event'] = array(
						'id' => $this->request->data['Booking']['id'],
						'title' => ucfirst($isExist['User']['fname']),//'<b>'.date('H:i A',strtotime($v['Booking']['start_time'])).'</b> '.ucfirst($v['User']['fname']),
						'start' => $save['Booking']['start_time'],
						'end' => $save['Booking']['end_time'],
						'className' => 'my_event',
						'color' => '#72c35d'
					);
				}else{
					$res['err'] = 1; $res['msg'] = 'Sorry, There is an error while update. Please try again';
				}
				//pr($response); prd($isExist);
			}
			echo json_encode($res,true); exit;
		}else{
			$this->request->data = $isExist;
			echo $this->render('/Elements/editEvent'); exit;							
		}
	}

	public function uwizard($id='@') {
		$this->layout = false;
		$this->loadModel('Package');
		$this->loadModel('User');
		$isExist = $this->User->find('first',array('fields'=>array('*'),'conditions'=>array('User.id'=>$id)));
		//$this->set(compact('isExist'));

		if($this->request->is('ajax') && $this->request->is('post')){
			$req = $this->request->data;
			$res['err'] = 1; $res['msg'] = 'Error.';
			if(	
				($req['Booking']['package_id']==''  && $req['Booking']['lession_id']=='') ||
				($req['Booking']['package_id']!=''  && $req['Booking']['lession_id']!='')
			){
				$res['err'] = 1; $res['msg'] = 'Please select Package OR Lession';
			}elseif(empty($isExist)){
				$res['err'] = 1; $res['msg'] = 'Please select instructor.';
			}else{
				$req['Booking']['u_id'] = $id;
				$res['err'] = 0; $res['msg'] = 'Success.'; $res['data'] = $req['Booking'];
				//echo $this->payment($req['Booking']); exit;
			}
			echo json_encode($res,true); exit;
			//pr($this->request->data); exit;
		}

		if(empty($isExist)){
			$res['err'] = 1; $res['msg'] = 'Sorry,This instructor is not available.';
			echo json_encode($res,true); exit;
		}else{
			$res['err'] = 0; 
			$res['msg'] = 'Instructor available.';
			$data['Package'] = Hash::combine($isExist['Package'], '{n}.id', '{n}.title');
			$data['PackageData'] = json_encode(Hash::combine($isExist['Package'], '{n}.id', '{n}'));
			$data['UserData'] = $isExist['User'];
			for($i=1;$i<=30;$i++){ $data['LessionData'][$i] = $i." Hours"; };
		}		
		$this->set(compact('data'));		
	}

	public function payment() {
		$this->layout = false;
		$this->loadModel('Package');
		$this->loadModel('Booking');
		$this->loadModel('User');
		$data = $_REQUEST;
		
		if($this->request->is('post') && $this->request->action=='payment'){
			App::import('Vendor','Stripe', array('file' => 'Stripe' . DS . 'init.php'));
			\Stripe\Stripe::setApiKey("sk_test_1BpRd66KA7yUPqEDMOwTqwjT");
			
			$req = $this->request->data;
			$isExist = $this->User->find('first',array('fields'=>array('*'),'conditions'=>array('User.id'=>$req['Booking']['u_id'])));
			$res['err'] = 1; $res['msg'] = 'Error.';
			if(	
				($req['Booking']['package_id']==''  && $req['Booking']['lession_id']=='') ||
				($req['Booking']['package_id']!=''  && $req['Booking']['lession_id']!='')
			){
				$res['err'] = 1; $res['msg'] = 'Please select Package OR Lession';
			}elseif(empty($isExist)){
				$res['err'] = 1; $res['msg'] = 'Please select instructor.';
			}elseif($req['Booking']['card']==""){
				$res['err'] = 1; $res['msg'] = 'Please fill card number.';
			}elseif($req['Booking']['month']==""){
				$res['err'] = 1; $res['msg'] = 'Please fill expiry month of card.';
			}elseif($req['Booking']['year']==""){
				$res['err'] = 1; $res['msg'] = 'Please fill expiry year of card.';
			}elseif($req['Booking']['cvv']==""){
				$res['err'] = 1; $res['msg'] = 'Please fill cvv number';
			}else{
				try{

					$res['err'] = 0; $res['msg'] = 'Booking Confirmed.'; $res['data'] = array('id'=>50);
					echo json_encode($res,true); exit;	

					$token = \Stripe\Token::create(array(
						"card" => array(
							"number" => $req['Booking']['card'],
							"exp_month" => $req['Booking']['month'],
							"exp_year" => $req['Booking']['year'],
							"cvc" => $req['Booking']['cvv']
							/*"number" => "4242424242424242",
							"exp_month" => 1,
							"exp_year" => 2017,
							"cvc" => "314"*/
						)
					));			
					
					$amount = $req['Booking']['amount']*100;
					$charge = \Stripe\Charge::create(array(
						"amount" => $amount,
						"currency" => "usd",
						"source" => $token['id'],
						"description" => "Charge Paib by ".$this->Session->read('Auth.User.email')."|".$req['Booking']['amount'] ,
						"metadata" => array("user" => $this->Session->read('Auth.User.email'),'amount'=>$req['Booking']['amount'],'date'=>date('Y-m-d H:i:s'))
					));

					if($charge->status=="paid"){
						$save['Booking']['user_id'] = $this->Session->read('Auth.User.id');
						$save['Booking']['instructor_id'] = $req['Booking']['u_id'];
						$save['Booking']['package_id'] = $req['Booking']['package_id'];
						$save['Booking']['lession_id'] = $req['Booking']['lession_id'];
						$save['Booking']['booking_amount'] = $req['Booking']['amount'];
						$save['Booking']['payment_token'] = $charge->id;
						$save['Booking']['status'] = 1;
						$save['Booking']['payment_status'] =1;
						$save['Booking']['created'] = date('Y-m-d H:i:s');
						$save['Booking']['modified'] = date('Y-m-d H:i:s');
						if($this->Booking->save($save,false)){
							$res['err'] = 0; $res['msg'] = 'Booking Confirmed.'; $res['data'] = $req['Booking'];	
						}else{
							$res['err'] = 1; $res['msg'] = 'If Your payment is deducted, Please contact to admin.';	
						}
						
					}
					
				} catch(\Stripe\Error\Card $e) {
					$body = $e->getJsonBody();
					$err  = $body['error'];
					$res['err'] = 1; $res['msg'] = $body['error']['message'];
				} catch (\Stripe\Error\RateLimit $e) {
				  	$body = $e->getJsonBody();
					$err  = $body['error'];
					$res['err'] = 1; $res['msg'] = $body['error']['message'];
				} catch (\Stripe\Error\InvalidRequest $e) {
				    $body = $e->getJsonBody();
					$err  = $body['error'];
					$res['err'] = 1; $res['msg'] = $body['error']['message'];
				} catch (\Stripe\Error\Authentication $e) {
				  	$body = $e->getJsonBody();
					$err  = $body['error'];
					$res['err'] = 1; $res['msg'] = $body['error']['message'];
				} catch (\Stripe\Error\ApiConnection $e) {
				  	$body = $e->getJsonBody();
					$err  = $body['error'];
					$res['err'] = 1; $res['msg'] = $body['error']['message'];
				} catch (\Stripe\Error\Base $e) {
					$body = $e->getJsonBody();
					$err  = $body['error'];
					$res['err'] = 1; $res['msg'] = $body['error']['message'];  
				} catch (Exception $e) {
				  	$body = $e->getJsonBody();
					$err  = $body['error'];
					$res['err'] = 1; $res['msg'] = $body['error']['message'];
				}
			}
			echo json_encode($res,true); exit;
		}

		if($data['package_id']!=""){
			$package = $this->Package->find('first',array('conditions'=>array('Package.id'=>$data['package_id'])));
			$mydata['price'] = $package['Package']['price'];
			$mydata['title'] = $package['Package']['title'];
		}else if($data['lession_id']!=""){
			$inst = $this->User->find('first',array('conditions'=>array('User.id'=>$data['u_id'])));
			$mydata['price']  = $inst['User']['hourly_rate'] * $data['lession_id'];
			$mydata['title'] = $data['lession_id'].' hours lession';
		}		
		$data['instructor'] = $inst['User'];
		$this->set(compact('mydata','data'));
		//$this->render('payment');
	}

	public function duration($booking_id='@') {
		$req = $this->request->data;
		$isExist = $this->Booking->find('first',array(
			'conditiond'=>array(
				'Booking.id'=>$booking_id,
				'Booking.payment_status'=>1,
				'Booking.status'=>array(1)
			)
		));
		
		if($this->request->is('post')){
			if(empty($isExist)){
				$res['err'] = 1; $res['msg'] = 'There is no booking,';
			}else{
				
			}	
		}
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

	public function history() {
        $this->layout = 'afterlogin';
        $this->loadModel('Booking');
        if ($this->request->is('ajax')) {
            $request = $this->request;
            $this->layout = 'ajax';
   			$page = $request->query('draw');
            $limit = $request->query('length');
            $start = $request->query('start');
            
            //for order
            $colName=$this->request->query['order'][0]['column'];
            $orderby[$this->request->query['columns'][$colName]['name']]=$this->request->query['order'][0]['dir'];
          
            $condition = array();
            //$condition ['Package.user_id ='] = $this->authData['id'];
            $condition ['Booking.status !='] = 0;
            //$condition ['Message.role !='] = 1;
           
            //pr($this->request->query['columns']);
		    foreach ($this->request->query['columns'] as $column){
		       if (isset($column['searchable']) && $column['searchable'] == 'true') {
		        	if(isset($column['name']) && $column['search']['value']!='') {
				         $condition[$column['name'].' LIKE '] = '%' .trim($column['search']['value']). '%';
				    }
			    } 
		    }
		    $total_records = $this->Booking->find('count', array('conditions' => $condition));
            
            $bookingData = $this->Booking->find('all', array(
                'contain'=>array('Review','Instructor','Package'=>array('Trainer'),'User'),
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
                	 $isReview = '';
                	 //prd($row);
     			     switch($row['Booking']['status']){
     			     	case 0 : $action = '<span class="label label-table label-warning">PENDING</span>'; break;
     			     	case 1 : $action='<span class="label label-table label-success">ACCEPT</span>'; break;
     			     	case 2 : $action='<span class="label label-table label-danger">DECLINE</span>'; break;
     			     	case 3 : $action='<span class="label label-table label-danger">DELETE</span>'; break;
     			     }

     			     $package_title = isset($row['Package']['title']) ? $row['Package']['title']:$row['Booking']['lession_id'].' hours lession' ;
     			     $duration = isset($row['Package']['duration']) ? $row['Package']['duration']." Hours": $row['Booking']['lession_id']." hours";

     			     if(!isset($row['Review']['id'])){
     			     	$isReview = ' | <span class="label label-table label-success review openModal" data-toggle="modal" data-target="#myModal" data-bookingid="'.$row['Booking']['id'].'" data-url="'.Router::url(array('controller' => 'bookings', 'action' => 'review',$row['Booking']['id'])).'" title="Place Review">REVIEW</span>'; 	
     			     }

     			     $action.= $isReview;
     			     
	                 //$action = '<span class="label label-table label-success">ACCEPT</span><span class="label label-table label-danger">DECLINE</span>';
	                 /*$action = '';
	                 $status = '';
	                 $role = $row['User']['role']==2 ? "Instroctor" : "User" ;*/
	                 
	                 /*if ($row['User']['status']==0)
	                 {
	                  $status .= '<i class="fa fa-circle fa-lg clr-red" onclick="changeUserStatus(' . $row['User']['id'] . ',0)" title="Change Status"></i>';
	                 }
	                 else if ($row['User']['status']==1)
	                 {
	                  $status .= '<i class="fa fa-circle fa-lg clr-green" onclick="changeUserStatus(' . $row['User']['id'] . ',1)" title="Change Status"></i>';
	                 }*/
	                 
	                 /*$action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/users/add_user/'.$row['User']['id']. '" title="Edit User"><i class="fa fa-edit fa-lg"></i></a> ';

	                 $row['User']['role']==2 ? $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/packages/index/'.$row['User']['id']. '" title="Package Detail"><i class="fa fa-th-list fa-lg"></i></a> ' : "";
	                 $row['User']['role']==2 ? $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot.'admin/bookings/index/'.$row['User']['id']. '" title="Booking Detail"><i class="fa fa-eye fa-lg"></i></a> ' : "";
	                                
	                 $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="change_status('.$row['User']['id'].')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';                    */
	                 $date = $this->Custom->dateFormatChange($row['Booking']['created'],$oldFormat="Y-m-d H:i:s",$newFormat="d/m/Y | H:i A");
                     $return_result['data'][]= array(
	                     $row['Instructor']['fname'],
	                     $package_title,
	                     $duration,
	                     $date,
	                     $action
	                     //date(Configure::read('Site.admin_date_format'), strtotime($row['User']['dob'])),
	                    //date(Configure::read('Site.admin_date_time_format'), strtotime($row['User']['date_added'])),
	                     //$role,
	                     //$action 
                    );

                    $i++;
                }
            }
           // pr($return_result);
            echo json_encode($return_result);
            exit;
        }    
    }

    public function review($id='') {
    	$this->layout = false;
    	$this->loadModel('Review');
    	$isExist = $this->Booking->find('first',array('contain'=>array('Instructor','Package'=>array('Trainer'),'User','Review'),'conditions'=>array('Booking.id'=>$id,'Booking.user_id'=>$this->authData['id'])));	
    	
    	if($this->request->is('post') && $this->request->is('ajax')){
    		if(isset($isExist['Review']['id'])){
    			$res['err'] = 1; $res['msg'] = 'Sorry,This bookingis already rated.';
				echo json_encode($res,true); exit;
    		}
    		if(!empty($isExist)){
    			$save['Review']['rating'] = $this->request->data['rate'];
    			$save['Review']['description'] = $this->request->data['description'];
    			$save['Review']['booking_id'] = $id;
    			$save['Review']['user_id'] = $this->authData['id'];
    			if($this->Review->save($save,false)){
    				$res['err'] = 0; $res['msg'] = 'Thank You.';
					echo json_encode($res,true); exit;	
    			}else{
    				$res['err'] = 1; $res['msg'] = 'Sorry, There is an error.';
					echo json_encode($res,true); exit;		
    			}
    			
    		}
    	}

    	if($isExist){

    	}else{
    		$res['err'] = 1; $res['msg'] = 'Sorry,This bookingis not belongs to you.';
			echo json_encode($res,true); exit;
    	}
    	$this->set('data',$isExist);
    }

    public function wizard() {
        $this->layout = 'afterlogin';
        $this->loadModel('Booking');
        $this->loadModel('Package');
        $this->loadModel('User');
        $this->Session->write('CurruntBooking.Trainer', 2);
        
        if(isset($this->authData['role']) && $this->authData['role'] !=3){
        	//prd($this->authData);
        	$this->Session->setFlash("Soory, Only users can be allowed to place booking.",'error');
 			$this->redirect(array('full_base'=>true,'controller'=>'pages','action'=>'home'));
        }
        
        $driver_id = $this->Session->read('CurruntBooking.Trainer');
        $driverData = $this->User->findById($driver_id);
        if(empty($driverData)){
        	//prd($this->authData);
        	$this->Session->setFlash("Soory, Please select instructor first.",'error');
 			$this->redirect(array('full_base'=>true,'controller'=>'pages','action'=>'home'));
        }

        /*$conditions['Package.user_id'] = $driver_id;
        $packageData = $this->Package->find('all',array('conditions'=>$conditions));
		prd($driverData);*/
        $this->set(compact('driverData'));
    }
}
