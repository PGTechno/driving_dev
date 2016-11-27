<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class Service extends AppModel {
    // other code.

   

        public $validate = array(
            'Service'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),    
        );
        
       
        
       
        
        public function beforeSave($options = array()){
            
        }
}