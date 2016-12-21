<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public $components = array(
	  'Paginator'
	);

	public $helpers = array(
	  'Paginator'
	);

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('home','search');
    }

	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function home() {
		$req['User']['drive'] = "";
		$req['User']['service'] ="";
		$req['User']['car'] ="";
		$req['User']['pincode'] ="";
		if($this->request->is('post')){
			$req['User'] = $this->request->data['User']; 
			$this->Session->write('Search', $req['User']);
		}else if($this->Session->check('Search')){
			$req['User'] = $this->Session->read('Search');
		}
		//pr($req);
		$this->request->data['User'] = $req['User'];
		/*else if($this->Session->check('Search') || isset($this->request->params['named']['page'])){
			$this->Session->write('Search', $req['User']);
		}*/

		$req = $this->request->data; 
		$this->loadModel('User');
		$this->loadModel('CarRelation');
		$this->loadModel('DriveExpRelation');
		$this->loadModel('ServiceRelation');
		//$this->User->Behaviors->load('Containable');

		$conditions['User.role'] = 2;
		$conditions['User.status'] = 1;
		
		if($req['User']['pincode'] !=""){
			try{
				$location = $this->Custom->getLnt($req['User']['pincode']);
			}
			catch(customException $e){
				$location = array('lat'=>'0.0','lng'=>'0.0');
			}
		}else{
			$location = array('lat'=>'0.0','lng'=>'0.0');
		}
		
		$Lat = $location['lat'];//'26.233453';
		$long = $location['lng'];//'72.233453';
		//$this->User->virtualFields = array('distance'=>'3956 * 2 * ASIN(SQRT( POWER(SIN(($Lat - Lat) * pi()/180 / 2), 2) + COS($Lat * pi()/180) * COS(Lat * pi()/180) *POWER(SIN(($long - long) * pi()/180 / 2), 2) ))');
		$this->User->virtualFields = array('distance'=>'3956 * 2 * ASIN(SQRT( POWER(SIN(('.$Lat.' - 26.2) * pi()/180 / 2), 2) + COS('.$Lat.' * pi()/180) * COS(26.2 * pi()/180) *POWER(SIN(('.$long.' - 72.1) * pi()/180 / 2), 2) ))');

		$this->Paginator->settings = array(
	        'joins' => array(
		        array(
		            'table' => 'car_relations',
		            'alias' => 'CarRelation',
		            'type' => 'INNER',
		            'conditions' => array(
		                'User.id = CarRelation.u_id',
		                'CarRelation.c_id'=>$req['User']['car'],
		            )
		        ),
		        array(
		            'table' => 'service_relations',
		            'alias' => 'ServiceRelation',
		            'type' => 'INNER',
		            'conditions' => array(
		                'User.id = ServiceRelation.u_id',
		                'ServiceRelation.s_id'=>$req['User']['service'],
		            )
		        ),
		        array(
		            'table' => 'drive_exp_relations',
		            'alias' => 'DriveExpRelation',
		            'type' => 'INNER',
		            'conditions' => array(
		                'User.id = CarRelation.u_id',
		                'DriveExpRelation.d_id'=>$req['User']['drive'],
		            )
		        )
		    ),
			'conditions'=>$conditions,
			'group'=>array('User.id'),
			'order'=>array('User.fname'=>'asc'),
			'limit' => 1,
	    );	
		
		$this->request->data['User']['response'] = $this->paginate('User');
		if(empty($this->request->data['User']['response'])){
			$this->Session->setFlash("Sorry, There is not record.",'error');
		}
		//prd($this->paginate('User'));			
		
	}

	public function search() {
		if($this->request->is('post') || isset($this->request->params['named']['page'])){
			$req = $this->request->data; 
			$this->loadModel('User');
			$this->loadModel('CarRelation');
			$this->loadModel('DriveExpRelation');
			$this->loadModel('ServiceRelation');
			//$this->User->Behaviors->load('Containable');

			$conditions['User.role'] = 2;
			$conditions['User.status'] = 1;

			$Lat = '26.233453';
			$long = '72.233453';
			//$this->User->virtualFields = array('distance'=>'3956 * 2 * ASIN(SQRT( POWER(SIN(($Lat - Lat) * pi()/180 / 2), 2) + COS($Lat * pi()/180) * COS(Lat * pi()/180) *POWER(SIN(($long - long) * pi()/180 / 2), 2) ))');
			$this->User->virtualFields = array('distance'=>'3956 * 2 * ASIN(SQRT( POWER(SIN(('.$Lat.' - User.lat) * pi()/180 / 2), 2) + COS('.$Lat.' * pi()/180) * COS(User.lat * pi()/180) *POWER(SIN(('.$long.' - User.long) * pi()/180 / 2), 2) ))');

			$this->Paginator->settings = array(
		        'joins' => array(
			        array(
			            'table' => 'car_relations',
			            'alias' => 'CarRelation',
			            'type' => 'INNER',
			            'conditions' => array(
			                'User.id = CarRelation.u_id',
			                'CarRelation.c_id='.$req['User']['car'],
			            )
			        ),
			        array(
			            'table' => 'service_relations',
			            'alias' => 'ServiceRelation',
			            'type' => 'INNER',
			            'conditions' => array(
			                'User.id = ServiceRelation.u_id',
			                'ServiceRelation.s_id='.$req['User']['service'],
			            )
			        ),
			        array(
			            'table' => 'drive_exp_relations',
			            'alias' => 'DriveExpRelation',
			            'type' => 'INNER',
			            'conditions' => array(
			                'User.id = CarRelation.u_id',
			                'DriveExpRelation.d_id='.$req['User']['drive'],
			            )
			        )
			    ),
				'conditions'=>$conditions,
				'group'=>array('User.id'),
				'order'=>array('User.fname'=>'asc'),
				'limit' => 1,
		    );

			/*$data = $this->User->find('all',array(
				'joins' => array(
			        array(
			            'table' => 'car_relations',
			            'alias' => 'CarRelation',
			            'type' => 'INNER',
			            'conditions' => array(
			                'User.id = CarRelation.u_id',
			                'CarRelation.c_id='.$req['User']['car'],
			            )
			        ),
			        array(
			            'table' => 'service_relations',
			            'alias' => 'ServiceRelation',
			            'type' => 'INNER',
			            'conditions' => array(
			                'User.id = ServiceRelation.u_id',
			                'ServiceRelation.s_id='.$req['User']['service'],
			            )
			        ),
			        array(
			            'table' => 'drive_exp_relations',
			            'alias' => 'DriveExpRelation',
			            'type' => 'INNER',
			            'conditions' => array(
			                'User.id = CarRelation.u_id',
			                'DriveExpRelation.d_id='.$req['User']['drive'],
			            )
			        )
			    ),
				'conditions'=>$conditions,
				'group'=>array('User.id'),
				'order'=>array('User.fname'=>'asc'),
				'limit' => 10,
			));*/
			
			//$this->request->data['User']['response'] = $data;
			$this->request->data['User']['response'] = $this->paginate('User');
			prd($this->paginate('User'));


			/*$conditions['User.role'] = 2;
			$conditions['User.status'] = 1;
			
			$data = $this->User->find('all',array(
				'conditions'=>$conditions,
				'contain'=>array(
					'Car'=>array(
						'conditions'=>array('Car.id'=>$req['User']['car'])
					),
					'Service'=>array(
						'conditions'=>array('Service.id'=>$req['User']['service'])
					),
					'DriveExperience'=>array(
						'conditions'=>array('DriveExperience.id'=>$req['User']['drive'])
					)
				)
			));
			prd($data);*/
		}
	}

	public function about() {
		//echo "Called"; exit;
	}

	public function faq() {
		//echo "Called"; exit;
	}

	public function contact() {
		//echo "Called"; exit;
	}

	public function varify($token="") {
		$this->loadModel('User');
		if($token !=""){
			$isExist = $this->User->find('first',array('conditions'=>array('User.varify_token'=>$token)));	
			if($isExist){
				$save['User']['id'] = $isExist['User']['id'];
				$save['User']['status'] = 1;
				$save['User']['varify_token'] = "";
				$this->User->save($save,false);
				$this->Session->setFlash("Your email has been varified successfully.",'success');
				$this->redirect(array('controller' => 'pages', 'action' => 'home'));
			}else{
				$this->Session->setFlash("Sorry, Link has been expired.",'error');
				$this->redirect(array('controller' => 'pages', 'action' => 'home'));
			}	
		}		
	}

	public function test() {
		echo "Called"; exit;
	}

	
}
