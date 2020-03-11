<?php namespace App\Controllers;

class Home extends BaseController
{
	protected $version = '1.0.0';
	public function index(){ 
		
	}

	public function homepage(){
		$this->template();
	}


	private function template(){
		helper(array('html','form'));
		$data['version'] = $this->version;
		$data['title'] = 'Loyalty Registration';

		echo view( 'templates/header', $data);
	//	echo view( 'templates/sidebar'); 
		echo view( 'home');
		echo view( 'templates/footer'); 
	}

	//--------------------------------------------------------------------

}
