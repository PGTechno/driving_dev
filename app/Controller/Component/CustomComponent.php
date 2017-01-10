<?php
//App::uses('Component', 'Controller');
class CustomComponent extends Component {
    function prd($data) {
        echo "<pre>";
        print_r($data);
        exit;
    }

    function uploadImage($newImg, $destination='images/users/', $prefix="user", $oldImg="",$isPdf=false){
    	//prd($newImg);
        if($newImg){
    		$allowedTypes = array('jpg','jpeg','png');
            if($isPdf) $allowedTypes = array('jpg','jpeg','png','pdf');
    		$ext = strtolower(pathinfo($newImg['name'], PATHINFO_EXTENSION));
    		if (in_array($ext, $allowedTypes)) {
			    $imgName = uniqid($prefix.'_').".".$ext;
                if(copy($newImg['tmp_name'],$destination.$imgName)){
			    	$this->deleteOldImage($destination.$oldImg);
			    	return	$imgName;
			    }else{
			    	return false;
			    }
			}else{
				return false;
			}    			
    	}
        return false;    	
    }

    function deleteOldImage($url){
        $url = WWW_ROOT.$url;
        if(is_file($url)){
    		if(unlink($url)){
    			return true;
    		}else{
    			return false;
    		}
    	}else{
    		return false;
    	}
    }

    function packageTimeInterval(){
        $interval = 15;
        $workingHours = 8*4*$interval/2;
        $time = array();
        for($interval;$interval < $workingHours; $interval+=15){
            $time[$interval] = $interval." Minutes"; 
        }
        return $time;
    }

    function timeZone($ip=""){
        try{     
              $url = "http://ip-api.com/json/$ip";
              $curl_handle=curl_init();
              curl_setopt($curl_handle,CURLOPT_URL,$url);
              curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
              curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
              $buffer = curl_exec($curl_handle);
              curl_close($curl_handle);
              if($buffer){
                    return json_decode($buffer,true);
              }else{
                    return false;
              }
        } catch (Exception $e) {
            $buffer = array('as'=>'AS9829 National Internet Backbone','city'=>'Jodhpur','country'=>'India','countryCode'=>'IN','isp'=>'BSNL','lat'=>'26.2867','lon'=>'73.03','org'=>'BSNL','query'=>'59.94.138.247','region'=>'RJ','regionName'=>'Rajasthan','status'=>'success','timezone'=>'Asia/Kolkata','zip'=>'342001');
            return $buffer;
        }      
    }

    function convertDate($date="",$oldTimeZone="UTC",$newTimeZone="",$format="Y-m-d H:i:s"){
        $oData = array();
        if($newTimeZone==""){ $oData = $this->timeZone(); $newTimeZone = $oData['timezone'];}
        $date = new DateTime($date, new DateTimeZone($oldTimeZone));
        $date->setTimezone(new DateTimeZone($newTimeZone));
        return $date->format($format);
    }

    function dateFormatChange($date,$oldFormat="Y-m-d H:i:s",$newFormat="Y-m-d H:i:s"){
        $myDateTime = DateTime::createFromFormat($oldFormat, $date);
        return $myDateTime->format($newFormat);
    }

    function sendEmail($title = "BACK_REGISTER", $keyword = "Ganpat,goyal@ga.com,123456", $params=array()){
        //$this-.sendEmail("BACK_REGISTER","ggg,ada,ada",$params)
        $model = ClassRegistry::init('EmailTemplate');
        /*$params['to'] = "aman@mailinator.com";
        $params['from'] = "company@mailinator.com";*/
        
        $isExist = $model->findByTitle($title);
        if($isExist){
            $from = ($params['from'] && $params['from'] !="") ? $params['from'] : Configure::read('Site.email');
            $to = $params['to'];
            $subject = Configure::read('Site.title').' : '.$isExist['EmailTemplate']['subject'];            
            $message = str_replace(explode(",", $isExist['EmailTemplate']['keyword']),explode(",",$keyword),$isExist['EmailTemplate']['content']);

            $Email = new CakeEmail();
            //$Email->config('gmail');
            //$Email->template('default', 'default');
            $Email->emailFormat('html');
            $Email->from(array($from => Configure::read('Site.title')));
            $Email->to($to);
            $Email->subject($subject);
            if($Email->send($message)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function sendNotification($sender , $receiver, $message, $params=array()){
        $model = ClassRegistry::init('Notification');
        //$isExist = $model->findByTitle($title);
        $model->sender = $sender;
        $model->receiver = $receiver;      
        $model->message = $message;
        $model->is_read = 0;
        $model->created = date('Y-m-d H:i:s');
        if($model->save()){
            return true;
        }
        return false;
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getLnt($zip){ 
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);
        $result1[]=$result['results'][0];
        $result2[]=$result1[0]['geometry'];
        $result3[]=$result2[0]['location'];
        return $result3[0];        
    }
}