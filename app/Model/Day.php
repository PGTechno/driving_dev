<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class Day extends AppModel {
    // other code.

   

        public $validate = array(
            'Day'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),    
        );
        
       
        
       
        
        public function beforeSave($options = array()){
            
        }
}