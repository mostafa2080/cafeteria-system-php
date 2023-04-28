<?php

namespace App\Controllers;
require_once 'app/Models/User.php';
use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::all();
        return $users;
        //require_once 'app/Views/users/index.php';
    }
}