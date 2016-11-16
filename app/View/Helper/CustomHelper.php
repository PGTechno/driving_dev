<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class CustomHelper extends AppHelper{
	public $helpers = array(
		//'Html',
		//'Form',
		//'Js',
		//'Image',
		'Session',
		//'Text',
		//'Time',
	);

	function chkImgExist($url){
		if(file_exists(WWW_ROOT.$url)){
			return $url;
		}else{
			return "img_not_found.jpg";
		}
	}

	function imageUrl($url='',$path='images/users/'){
		//echo $url;exit;
		$authData = $this->Session->read('Auth.User');
		if(is_file($path.$url)){
			return $this->webroot.'images/users/'.$url;
		}elseif($authData['fb_token'] !=""){
			return "http://graph.facebook.com/".$authData['fb_token']."/picture?type=small";
		}else{
			return $path."no_profile_image.jpg";
		}
	}
}
