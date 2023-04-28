<?php

namespace App\Controllers;
require_once 'app/Models/User.php';
use App\Models\User;

class UserController
{
    public static function index()
    {
        $users = User::all();
        require_once ('app/Views/user/index.php');

    }

    public static function create()
    {
        require_once ('app/Views/user/create.php');
    }

    public static function show($id)
    {
        $user = User::find($id);
        require_once ('app/Views/user/show.php');
    }

    public static function store()
    {
        $data = $_POST;
        $user = User::create($data);
        if ($user){
            header('Location: /users');
        }
    }

    public static function edit($id)
    {
        $user = User::find($id);
        require_once ('app/Views/user/edit.php');
    }

    public static function update()
    {
        $data = $_POST;
        $user = User::update($data);

        if ($user){
            header('Location: /users');
        }
    }

    public static function destroy($id)
    {
        $user = User::delete($id);
        if ($user){
            header('Location: /users');
        }
    }


}