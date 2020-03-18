<?php namespace App\Controllers;
//use CodeIgniter\RESTful\ResourceController;

class Home extends BaseController
{
	protected $version = '1.0.1'; 
	protected $page;
	protected $title;
 

	public function index(){ 
		
	}

	public function views(){
		$this->page = 'home';
		$this->title = 'Home';
		$this->template();
	} 

	public function registration(){
		$this->page = 'register';
		$this->title = 'Registration';

		$this->template();
	}

	private function template(){
		
		// Calling helpers
		helper(array('html','form'));
		
		// Update Version of custom CSS/JS files : bundle.css?v=1.0.0
		$data['version'] = $this->version;

		$data['title'] = $this->title;
  
		echo view( 'templates/header', $data); 
		echo view( $this->page);
		echo view( 'templates/footer'); 
	} 

	// public function create() {
			 
	// 	$this->isValidate();

	// 		helper('form','url'); 
			
	// 		$data = $this->request->getJSON();	 
		 
	// 		$userModel  = model('App\Models\UserModel', false); 
		 
	// 		$items = [
	// 				'cv'    			=> $data->contents->email,
	// 				'parent_id' 		=> 0,
	// 				'contents' 			=> json_encode(serialize($data)),
	// 				'expiry_date' 		=> '0000-00-00 00:00:00'
	// 		];

	// 		$result = $userModel->save($items); 
			
	// 		if($result){
	// 			$response = 'Success';
	// 		}else{
	// 			$response = json_encode($userModel->errors());
	// 		}

	// 		return  $response; 
	// }

	private function isValidate(){
		if (!$this->request->isAJAX()){
			return false;
		}
	}
}
