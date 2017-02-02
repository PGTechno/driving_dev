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

    function chkBookingDuplicacy($booking_id='', $dateTime = "2016-12-20 20:15:00", $duration=5,$params=array()){
        $model = ClassRegistry::init('Booking');
        /*$params['to'] = "aman@mailinator.com";
        $params['from'] = "company@mailinator.com";*/
        
        $isExist = $model->findById($booking_id);
        if($isExist){
            if(!$duration || $duration > $isExist['Booking']['hours_count']){
                $res['err'] = 1; $res['msg'] = 'Please select hours below or equal to '.$isExist['Booking']['hours_count'];
            }else if($dateTime < date('H:i:s',strtotime($isExist['Instructor']['start_time']))  ||  $dateTime >date('H:i:s',strtotime($isExist['Instructor']['end_time']))){
                $res['err'] = 1; $res['msg'] = 'Sorry, Instructor available b/w'.date('H:i:s',strtotime($isExist['Instructor']['start_time'])).' to '.date('H:i:s',strtotime($isExist['Instructor']['end_time']));
            }else if(1){

            }    
            //$res['err'] = 1; $res['msg'] = 'Please'; $res['data']= $isExist;
        }else{
            $res['err'] = 1; $res['msg'] = 'Please provide booking detail';
        }
        return $res;
    }

    function chkBookingAvailablity($instructor_id='11', $dateTime = "2017-01-29 20:15:00"){
        $model = ClassRegistry::init('Schedule');
        $user = ClassRegistry::init('User');
        /*$params['to'] = "aman@mailinator.com";
        $params['from'] = "company@mailinator.com";*/
        $isUser = $user->find('first',array(
            'conditions'=>array(
                'User.id'=>$instructor_id ,
                'User.role'=>2 ,
                'User.status'=>1 
            )
        ));

        $timeStols = array();
        if($isUser && $isUser['User']['start_time'] && $isUser['User']['end_time']){
            $instStartTime = strtotime($isUser['User']['start_time']);
            $instEndTime = strtotime($isUser['User']['end_time']);
            for($i =  $instStartTime; $i<=$instEndTime;$i=$i+3600){
                if(($instStartTime + 3600) > $instEndTime){
                    break;    
                }else{
                    $timeStols[] = array(
                        'start'=>date('H:i:s',$i),
                        'end'=>date('H:i:s',$i + 3599)
                    );
                }
            }
        }

        //prd($timeStols);

        $model->virtualFields = array('end_date'=>'DATE_ADD(Schedule.date, INTERVAL Schedule.duration * 60 -1 MINUTE)');
        $isExist = $model->find('all',array(
            //'conditions'=>array('')
            'fields'=>array(
                'Schedule.*'
            ),
            'joins'=>array(
                array(
                    'table' => 'bookings',
                    'alias' => 'Booking',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Schedule.booking_id = Booking.id',
                        'Booking.instructor_id ='.$instructor_id,
                        'DATE(Schedule.date) = "'.date('Y-m-d',strtotime($dateTime)).'"'
                        //'Schedule.date >="'.date('Y-m-d H:i:s').'" and DATE(Schedule.date) = "'.date('Y-m-d',strtotime($dateTime)).'"'
                    )
                ),
            ),
            'order'=>array(
                'Schedule.date'=>'ASC'
            )
        ));

        foreach ($timeStols as $k => $v) {
            //$v['start']
            //$v['end']
            foreach ($isExist as $k1 => $v1) {
                $stime = date("H:i:s",strtotime($v1['Schedule']['date']));
                $etime = date("H:i:s",strtotime($v1['Schedule']['end_date']));
                if(
                    ($v['start'] >= $stime && $v['end'] <= $etime) ||
                    ($v['start'] >= $stime && $v['start'] <= $etime) ||
                    ($v['end'] >= $stime && $v['end'] <= $etime) 
                ){
                    unset($timeStols[$k]);
                }
                //prd($v1);  
            }
        }

        /*prd($timeStols);
        prd($isExist);*/
        if($timeStols){
            $schedule = array();
            
            foreach ($timeStols as $k2 => $v2) {
                $schedule[$v2['start']] =  $v2['start'].' To '. date("H:i:s",strtotime($v2['start']." +1 hour"));
            }
            //prd($schedule);
            $r = array();
            foreach ($schedule as $k => $v) {
                $st = $k;
                $count = 1;
                unset($schedule[$k]);
                foreach ($schedule as $k => $v) {
                    $et = date('H:i:s',strtotime($st.' +'.$count.' hour'));
                    if($k==$et){
                        $r[$count][] = $st."-".$et;
                        $count++;                        
                    }else{
                        break;
                    }
                    
                }   
            }
            //prd($r);
            $finalArray = array();
            foreach($r as $k => $v){
              if(isset($v))
                {
                   $finalArray = array_merge($finalArray, (array) $v);
                   //unset($a[$key]['fields']);
                }
            }
            
            /*--------------------*/
            $res['err'] = 0; $res['msg'] = 'Schedule available'; $res['schedule'] = $finalArray ;
        }else{
            $res['err'] = 1; $res['msg'] = 'Soory, Instructor having busy schedule';
        }
        return $res;
    }

    
}