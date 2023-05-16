<?php

namespace App\Controllers;
// require_once 'app/Models/Order.php';
require_once 'app/Models/User.php';
// use App\Models\Order;
use App\Models\User;

class CheckController
{
    public static function index()
    {
        // $checks = Order::all();
        // To be continued...
        require_once ('app/Views/check/index.php');

    }

}