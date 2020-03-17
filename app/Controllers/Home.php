<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourcePresenter;
class Home extends ResourcePresenter
{
	protected $version = '1.0.0';
	protected $modelName = 'App\Models\UserModel';

	public function index(){ 
		
	}

	public function homepage(){
		$this->template();
	}


	private function template(){
		helper(array('html','form','array'));
		$data['version'] = $this->version;
		$data['title'] = 'Loyalty Registration';

		//$data['required'] = json_encode(array('fname','lname','dob', 'gender', 'mobile', 'email', 'nationality', 'states', 'address'));
		 
		echo view( 'templates/header', $data); 
		echo view( 'home');
		echo view( 'templates/footer'); 
	}

	public function create() {
		if ($this->request->isAJAX()){
			helper('form');
			header('Content-type: application/json; charset=utf-8');
			$array = json_decode(file_get_contents('php://input'));
				 
				
			//	return $this->request->getPost();
		 
			 
			$userModel  = model('App\Models\UserModel', false);

			// if (! $this->validate([
			// 	'fname' => 'required|min_length[3]|max_length[255]',
			// 	'lname'  =>  'required|min_length[3]|max_length[255]'
			// ]))
			// {
				
			// 	$data['version'] = $this->version;
			// 	$data['title'] = 'Loyalty Registration';

			// 	echo view( 'templates/header', $data); 
			// 	echo view( 'home');
			// 	echo view( 'templates/footer'); 

			// }
			// else
			// {
				$data = [
						'cv'    			=> 'd.vader@theempire.com',
						'parent_id' 		=> 1,
						'contents' 			=> json_encode(serialize($array)),
						'expiry_date' => '2020-08-06 12:00:00'
				];
				$userModel->save($data); 
				return json_encode($data);
			//}
		}
	}

}
