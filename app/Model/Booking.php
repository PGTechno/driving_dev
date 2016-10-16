<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class Booking extends AppModel {
    public $hasMany = array(
        /*'Country' => array(
            'className' => 'Package',
            'foreignKey' => 'user_id'
        )*/
    );

    public $belongsTo = array(
        'Package' => array(
            'className' => 'Package',
            'foreignKey' => 'package_id'
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
  

    public $validate = array(
            /*'email'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                ),
                array(
                    'rule'=>array('email'),
                    'message'=>'Please enter valid email address.'
                ),
                array(
                    'rule'=>'isUniquee',
                    'message'=>'User with this email already registered'
                )
            ),

          
            'fname'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),
            'lname'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),*/

        );
        
       /* public function isUniquee($dd){
            $e_data = $this->find('first',array('conditions'=>array('email'=>$this->data['User']['email'])));
            //prd($this->data); exit;
            if(empty($e_data)){
                return true;
            }else if($e_data['User']['id']==$this->data['User']['id']){
                return true;
            }else{
                return false;
            }
        }*/
        
       
        public function isBookingConflict($data = array()){
            $res = array('err'=>1,'msg'=>'');
            $package =$this->Package->find('first',array('conditions'=>array('Package.id'=>$data['package_id'],'Package.status'=>1)));
            if(empty($package)){
                $res = array('err'=>1,'msg'=>'Please select valid package.');    
            }else{
                $uStartTime =   strtotime(substr($data['start'],-8));
                $uEndTime   =   strtotime(date("H:i:s",strtotime(substr($data['start'],-8).' +'.$package['Package']['duration'].'minutes')));
                $tStartTime =   strtotime($package['Trainer']['start_time']);
                $tEndTime   =   strtotime($package['Trainer']['end_time']);
                if($uStartTime < $tStartTime || $uStartTime > $tEndTime || $uEndTime > $tEndTime || $uEndTime < $tStartTime){
                    $res = array('err'=>1,'msg'=>'Soory, Trainer is not available on this time schedule.');        
                }else{
                    $this->virtualFields = array(
                        'start'=>"'".$data['start']."'",
                        'end'=>"DATE_ADD('".$data['start']."',INTERVAL ".$package['Package']['duration']." MINUTE)"
                    );
                    $booking = $this->find("all",array(
                        'conditions'=>array(
                            'Booking.status'=>1,
                            'OR'=>array(
                                '"'.$data['start'].'" BETWEEN Booking.start_time and Booking.end_time',
                                'DATE_ADD("'.$data["start"].'", INTERVAL '.$package["Package"]["duration"].' MINUTE) BETWEEN Booking.start_time and Booking.end_time',
                            )
                        )
                    )); 
                    
                    if(empty($booking)){
                        $res = array('err'=>0,'msg'=>'You can proceed for booking.');
                    }else{
                        $res = array('err'=>1,'msg'=>'Sorry, There is already an booking with same time.');
                    }   
                }
            }
            
            if($_POST){
                return json_encode($res);
            }else{
                echo json_encode($res);exit;
            }
            
        }


        public function beforeSave($options = array()){
            if(isset($this->data['Booking']['id']) && $this->data['Booking']['id'] ==""){
                $this->data['Booking']['created'] = date('Y-m-d H:i:s');   
            }
            $this->data['Booking']['modified'] = date('Y-m-d H:i:s');
            //prd($this->data['User']);
        }
}