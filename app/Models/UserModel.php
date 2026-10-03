<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'full_name', 'role', 'avatar'];
    protected $useTimestamps = false;

    protected $validationRules = [
        'username'  => 'required|min_length[3]|is_unique[users.username,id,{id}]',
        'full_name' => 'required|min_length[2]',
    ];
}