<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('Model', 'Model');
class DriveExperience extends AppModel {
    // other code.

   

        public $validate = array(
            'DriveExperience'=>array(
                array(
                    'rule'=>'notBlank',
                    'message'=>'This field is required.'
                )
            ),    
        );
        
       
        
       
        
        public function beforeSave($options = array()){
            
        }
}