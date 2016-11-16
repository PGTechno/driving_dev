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
class InboxController extends AppController {

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

    public function index() {
        $this->layout = 'afterlogin';
        $this->loadModel('Message');
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
            $condition ['OR']['Message.sender ='] = $this->authData['id'];
            $condition ['OR']['Message.receiver ='] = $this->authData['id'];
            $condition ['Message.receiver_delete ='] = 0;
           
            //pr($this->request->query['columns']);
		    foreach ($this->request->query['columns'] as $column){
		       if (isset($column['searchable']) && $column['searchable'] == 'true') {
		        	if(isset($column['name']) && $column['search']['value']!='') {
				         $condition[$column['name'].' LIKE '] = '%' .trim($column['search']['value']). '%';
				    }
			    } 
		    }
		    $this->Message->virtualFields=array(
                'isSender'=>'if(Message.sender='.$this->authData['id'].',1,0)',
                'other_uid'=>'if(Message.sender='.$this->authData['id'].',Message.receiver,Message.sender)',
            );
            $total_records = $this->Message->find('count', array('conditions' => $condition,'group'=>'Message.other_uid'));
            
            $messageData = $this->Message->find('all', array(
                'conditions' => $condition,
                //'fields' => $fields,
                'group'=>'Message.other_uid',
                'order' => $orderby,
                'limit' => $limit,
                'offset' => $start
            ));
            //prd($messageData);

            $return_result['draw'] = $page;
            $return_result['recordsTotal'] = $total_records;
            $return_result['recordsFiltered'] = $total_records;
            
    
            $return_result['data']=array();
            if (isset($messageData[0])) {
             $i = $start + 1;
                foreach ($messageData as $row) {
     
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
	                 $chkBox = '<input type="checkbox" data-id="'.$row['Message']['id'].'"/>';
                     $date = $this->Custom->dateFormatChange($row['Message']['created'],$oldFormat="Y-m-d H:i:s",$newFormat="d M Y");
                     $return_result['data'][]= array(
	                     $chkBox,//$row['User']['id'],
	                     $row['Message']['subject'],
	                     //$row['User']['lname'],
	                     $row['Message']['message'],
	                     $date,

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

    public function deleteMessage(){
        if($this->request->is('post') || $this->request->is('put')){
            $req = $this->request->data;    
            prd($req);
        }
    }

	
	
}
