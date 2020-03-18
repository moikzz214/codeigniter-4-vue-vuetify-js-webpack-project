<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['contents'];
    protected $validationRules    = [ 'contents'   => 'required'  ]; 
}