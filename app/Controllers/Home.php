<?php namespace App\Controllers;
//use CodeIgniter\RESTful\ResourcePresenter;

class Home extends BaseController
{
	protected $version = '1.0.0'; 

	public function index(){ 
		
	}

	public function homepage(){
		$this->template();
	} 

	private function template(){
		
		// Calling helpers
		helper(array('html','form'));
		
		// Update Version of custom CSS/JS files : bundle.css?v=1.0.0
		$data['version'] = $this->version;

		$data['title'] = 'Registration';
  
		echo view( 'templates/header', $data); 
		echo view( 'home');
		echo view( 'templates/footer'); 
	}

	public function create() {
			 
		$this->isValidate();

			helper('form','url'); 
			
			$data = $this->request->getJSON();	 
		 
			$userModel  = model('App\Models\UserModel', false); 
		 
			$items = [
					'cv'    			=> $data->contents->email,
					'parent_id' 		=> 0,
					'contents' 			=> json_encode(serialize($data)),
					'expiry_date' 		=> '0000-00-00 00:00:00'
			];

			$result = $userModel->save($items); 
			
			if($result){
				$response = 'Success';
			}else{
				$response = json_encode($userModel->errors());
			}

			return  $response; 
	}

	private function isValidate(){
		if (!$this->request->isAJAX()){
			return false;
		}
	}
}
