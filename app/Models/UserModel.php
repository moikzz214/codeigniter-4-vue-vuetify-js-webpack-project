<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user_profile';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cv', 'parent_id', 'contents', 'expiry_date'];
    protected $validationRules    = [
                                        'cv'         => 'required|valid_email|is_unique[user_profile.cv]',
                                        'contents'   => 'required' 
                                    ];

    protected $validationMessages = [
            'cv'    =>  [
                        'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
                        ]
            ];
}