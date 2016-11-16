<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class Review extends AppModel {
    // other code.

    public $actsAs = array('Containable'); 
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

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Booking' => array(
            'className' => 'Booking',
            'foreignKey' => 'booking_id'
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
           

          
            'rating'=>array(
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

            
        );
        
        
        
        
        
        public function beforeSave($options = array()){
            if(isset($this->data['Review']['id']) && $this->data['Review']['id'] ==""){
                $this->data['Review']['created'] = date('Y-m-d H:i:s');   
            }
            $this->data['Review']['modified'] = date('Y-m-d H:i:s');
        }
}