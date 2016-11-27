<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class User extends AppModel {
    // other code.

    /*public $hasOne = array(
        'Country'
    );*/
    // public $hasMany = array(
    //     'Country' => array(
    //         'className' => 'Country',
    //         //'foreignKey' => 'id'
    //         /*'conditions' => array('Recipe.approved' => '1'),
    //         'order' => 'Recipe.created DESC'*/
    //     )
    //);

    public $hasMany = array(
        /*'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'user_id'
        ),*/
        'Package' => array(
            'className' => 'Package',
            'foreignKey' => 'user_id'
        )
    );

    public $belongsTo = array(
        'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country'
        )
    );

     public $hasAndBelongsToMany = array(
        'Car' => array(
            'className' => 'Car',
            'joinTable' => 'car_relations',
            'foreignKey' =>'u_id',
            'associationForeignKey' => 'c_id'
        ),
        'Service' => array(
            'className' => 'Service',
            'joinTable' => 'service_relations',
            'foreignKey' =>'u_id',
            'associationForeignKey' => 's_id'
        ),
        'DriveExperience' => array(
            'className' => 'DriveExperience',
            'joinTable' => 'drive_exp_relations',
            'foreignKey' =>'u_id',
            'associationForeignKey' => 'd_id'
        )
    );
   /* public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password(
          $this->data['User']['password']
        );
        if(isset($this->data['User']['id']) && $this->data['User']['id'] ==""){
        	$this->data['User']['created'] = date('Y-m-d H:i:s'); 	
        }
        $this->data['User']['modified'] = date('Y-m-d H:i:s');
        return true;
    }*/

    public $validate = array(
            'email'=>array(
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
            ),

            'password'=>array(
                array(
                        'allowEmpty'=>true,
                        'rule'=>array('between',6,15),
                        'message'=>'Enter 6-15 charecters'
                )
            ),
            'cpassword'=>array(
                array(
                        'rule'=>'comparepwd',
                        'message'=>'Password does not match'
                )
            ),
            'phone'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                ),
                array(
                    'rule'=>'phone',
                    'message'=>'Please enter valid phone numbers.'
                )
            ),   
            'address'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),
            'city'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),
            'zip'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                ),
                array(
                    'rule'=>array('postal', null, 'us'),
                    'message'=>'Please enter valid zip code. (US)'
                )
            ),
            'services'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),
            'user_image' => array(
                'allowEmpty'=>true,
                'rule' => array('chkImageExtension'),
                'message' => 'Please Upload Valid Image.'
            ),
            'adi_certificate_file' => array(
                'allowEmpty'=>true,
                'rule' => array('chkImageExtension'),
                'message' => 'Please Upload Valid File.'
            ),
            'driving_licence_file' => array(
                'allowEmpty'=>true,
                'rule' => array('chkImageExtension'),
                'message' => 'Please Upload Valid File.'
            ),
            
        );

        public function chkImageExtension($data) {
            $return = false;
            $ext = array(
                'user_image'=>array('jpeg', 'png', 'jpg'),
                'adi_certificate_file'=>array('jpeg', 'png', 'jpg','pdf'),
                'driving_licence_file'=>array('jpeg', 'png', 'jpg','pdf')
            );

            $fileFields = array(
                'user_image'=>'image',
                'adi_certificate_file'=>'adi_certificate',
                'driving_licence_file'=>'driving_licence'
            );
            $allowExtension = $ext[key($data)];

            if($data[key($data)]['error']){
                if($this->data['User'][$fileFields[key($data)]]){
                    $return = true;
                }else{
                    $return = false;
                }
            }else{
                $fileData   = pathinfo($data[key($data)]['name']);
                $ext        = $fileData['extension'];
                if(in_array($ext, $allowExtension)) {
                    $return = true; 
                } else {
                    $return = false;
                }
            }
            return $return;
        } 
        
        public function isUniquee($dd){
            $e_data = $this->find('first',array('conditions'=>array('email'=>$this->data['User']['email'])));
            //prd($this->data); exit;
            if(empty($e_data)){
                return true;
            }else if($e_data['User']['id']==$this->data['User']['id']){
                return true;
            }else{
                return false;
            }
        }
        
        public function comparepwd($dd){ 
            if($this->data['User']['password']!="" && $this->data['User']['password'] != $this->data['User']['cpassword']){
                return false;
            }else{
                return true;
            }
        }
        
        public function beforeSave($options = array()){
            if(isset($this->data['User']['id']) && $this->data['User']['id'] ==""){
                $this->data['User']['created'] = date('Y-m-d H:i:s');   
            }
            $this->data['User']['modified'] = date('Y-m-d H:i:s');

            if(isset($this->data['User']['password']) && $this->data['User']['password'] !="")
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            else
                unset($this->data['User']['password']);
            //prd($this->data['User']);
        }
}