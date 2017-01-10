<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class Notification extends AppModel {
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
        /*'Package' => array(
            'className' => 'Package',
            'foreignKey' => 'user_id'
        )*/
    );

    public $belongsTo = array(
        'Sender' => array(
            'className' => 'User',
            'foreignKey' => 'sender'
        ),
        'Receiver' => array(
            'className' => 'User',
            'foreignKey' => 'receiver'
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
            
        );
        
       
        
       
        
        public function beforeSave($options = array()){
            /*if(isset($this->data['User']['id']) && $this->data['User']['id'] ==""){
                $this->data['User']['created'] = date('Y-m-d H:i:s');   
            }
            $this->data['User']['modified'] = date('Y-m-d H:i:s');

            if(isset($this->data['User']['password']) && $this->data['User']['password'] !="")
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            else
                unset($this->data['User']['password']);*/
        }
}