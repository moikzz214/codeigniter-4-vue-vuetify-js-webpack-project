<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
 
class Products extends ResourceController
{
 
    protected $modelName = 'App\Models\ProductModel';
    protected $format    = 'json';

	public function index(){   
        
        return $this->response->setJSON($this->model->findAll());
       
    }  
    
    public function create(){
		$this->isValidate();

		helper('form','url'); 
		
		$data = $this->request->getJSON();	 
		
		$userModel  = model('App\Models\ProductModel', false); 
		
		$items = [ 'contents'  => json_encode($data)]; 
		 
		$result = $userModel->save($items);

		if($result){
			$response = 'Success';
		}else{
			$response = json_encode($userModel->errors());
		}

		return  $response; 
	} 

	public function update($id=null){
		$this->isValidate(); 
		$data = $this->request->getJSON();
		$userModel  = model('App\Models\ProductModel', false); 
		
		 $items = [ 'contents'  => json_encode($data)]; 
		 
		 $result = $userModel->update($id, $items);

		if($result){
			$response = 'Success';
		}else{
			$response = json_encode($userModel->errors());
		}

		return json_encode($response);
	} 

	public function remove($id){
		$this->isValidate(); 
	 
		helper('form','url');  
		
		$userModel  = model('App\Models\ProductModel', false);  

		$result = $userModel->delete($id);
		
		if($result){
			$response = true;
		}else{
			$response = json_encode($userModel->errors());
		}

		return  $id; 
	}
    
    private function isValidate(){
		if (!$this->request->isAJAX()){
			return false;
		}
	}
}
