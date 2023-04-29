<?php

namespace App\Controllers;
session_start();
class AdminController
{
    public static function login()
    {
        require_once ('app/Views/login.php');
    }

    public static function check()
    {
        $data = $_POST;
        if ($data['email'] == 'admin@admin.com' && $data['password'] == '123456') {
            $_SESSION['admin'] = true;

            header('Location: /users');
        } else {
            header('Location: /login');
        }
    }

    public static function logout()
    {
        session_destroy();
        header('Location: /admin/login');
    }


}