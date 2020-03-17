<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user_profile';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cv', 'parent_id', 'contents', 'expiry_date'];
    
}