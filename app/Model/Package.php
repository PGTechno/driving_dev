<?php
//App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class Package extends AppModel {
    // other code.

   /* public $hasOne = array(
        'User'
    );*/

   /* public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );*/
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

    public $belongsTo = array(
        'Trainer' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

        public $validate = array(
            'title'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),
            'description'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),
            'price'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            )
                  
        );
        
        public function beforeSave($options = array()){
            if(isset($this->data['Package']['id']) && $this->data['Package']['id'] ==""){
                $this->data['Package']['created'] = date('Y-m-d H:i:s');   
            }
            $this->data['Package']['modified'] = date('Y-m-d H:i:s');

            //prd($this->data['User']);
        }
}