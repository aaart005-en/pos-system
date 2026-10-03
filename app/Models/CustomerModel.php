<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['full_name', 'email', 'phone'];
    protected $useTimestamps = false;

    protected $validationRules = [
        'full_name' => 'required|min_length[2]',
        'email'     => 'required|valid_email',
    ];
}