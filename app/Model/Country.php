<?php
//App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class Country extends AppModel {
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

        public $validate = array();
        
        /*public function beforeSave($options = array()){
            if(isset($this->data['User']['id']) && $this->data['User']['id'] ==""){
                $this->data['User']['created'] = date('Y-m-d H:i:s');   
            }
            $this->data['User']['modified'] = date('Y-m-d H:i:s');

            if(isset($this->data['User']['password']) && $this->data['User']['password'] !="")
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            else
                unset($this->data['User']['password']);
            //prd($this->data['User']);
        }*/
}