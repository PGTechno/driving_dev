<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class Car extends AppModel {
    // other code.

   

        public $validate = array(
            'Car'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),    
        );
        
       
        
       
        
        public function beforeSave($options = array()){
            
        }
}