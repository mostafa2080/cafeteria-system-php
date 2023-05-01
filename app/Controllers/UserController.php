<?php

namespace App\Controllers;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'app/Models/User.php';
use App\Models\User;

class UserController
{
    public static function index()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $users = User::all();
        require_once ('app/Views/user/index.php');

    }

    public static function create()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        require_once ('app/Views/user/create.php');
    }

    public static function show($id)
    {
        if (!isset($_SESSION['admin']) || !isset($_SESSION['user'])){
            header('Location: /admin/login');
        }
        $user = User::find($id);
        require_once ('app/Views/user/show.php');
    }

    public static function store()
    {
        if (!isset($_SESSION['admin']) || !isset($_SESSION['user'])){
            header('Location: /admin/login');
        }

        $data = $_POST;
        // validation
        if ($data['name'] == '' || $data['email'] == '' || $data['password'] == ''){
            $_SESSION['create_error'] = 'All fields are required';
            header('Location: /users/create');
        }else{
            unset($_SESSION['create_error']);
        }
        // image validation
        $allowedExt = ['png', 'jpg', 'jpeg', 'gif'];
        $imageExt = explode('/', $_FILES['image']['type'])[1];
        if (!in_array($imageExt, $allowedExt)){
            die('image not allowed');
        }
        // save image
        $image = $_FILES['image'];
        var_dump($image);
        $imageName = time() . '-' . $image['name'];
        $imageTmp = $image['tmp_name'];
        move_uploaded_file($imageTmp, 'public/images/' . $imageName);
        $data['image'] = $imageName;
        // hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        // create user
        $user = User::create($data);
        if ($user){
            header('Location: /users');
        }
    }

    public static function edit($id)
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }

        $user = User::find($id);
        require_once ('app/Views/user/edit.php');
    }

    public static function update()
    {
        if (!isset($_SESSION['admin']) || !isset($_SESSION['user'])){
            header('Location: /admin/login');
        }

        $data = $_POST;

        // check if image is uploaded
        $user = User::find($data['id']);
        if ($_FILES['image']['name'] != null){
            // image validation
            $allowedExt = ['png', 'jpg', 'jpeg', 'gif'];
            $imageExt = explode('/', $_FILES['image']['type'])[1];
            if (!in_array($imageExt, $allowedExt)){
                die('image not allowed');
            }
            // save image
            $image = $_FILES['image'];
            $imageName = time() . '-' . $image['name'];
            $imageTmp = $image['tmp_name'];
            move_uploaded_file($imageTmp, 'public/images/' . $imageName);
            // delete old image

            unlink('public/images/' . $user->image);
            $data['image'] = $imageName;
        }
        else{
            $data['image'] = $user->image;
        }
        if ($data['password'] != ''){
            // hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        $user = User::update($data);

        if ($user){
            header('Location: /users');
        }
    }

    public static function destroy($id)
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }

        $user = User::delete($id);
        if ($user){
            header('Location: /users');
        }
    }

    public static function ResetPassword($id)
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }

        $user = User::updateSingle($id,'password','123456');
        if ($user >= 0 ){
            header('Location: /users');
        }
    }

    public static function login()
    {
        require_once ('app/Views/user/login.php');
    }

    public static function loginPost()
    {
        $data = $_POST;
        $user = User::findByEmail($data['email']);
        if ($user){
            if (password_verify($data['password'], $user->password)){
                $_SESSION['user'] = $user;
                header('Location: /');
            }
        }
    }

    public static function logout()
    {
        session_destroy();
        header('Location: /');
    }

    public static function register()
    {
        require_once ('app/Views/user/register.php');
    }


}