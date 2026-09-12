<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            ['username' => 'jcruz', 'full_name' => 'Juan Cruz', 'role' => 'Admin'],
            ['username' => 'msantos', 'full_name' => 'Maria Santos', 'role' => 'Cashier'],
            ['username' => 'preyes', 'full_name' => 'Pedro Reyes', 'role' => 'Manager'],
            ['username' => 'agarcia', 'full_name' => 'Ana Garcia', 'role' => 'Cashier'],
            ['username' => 'jram', 'full_name' => 'Jose Ramirez', 'role' => 'Staff'],
        ];

        return view('users/index', ['users' => $users]);
    }
}