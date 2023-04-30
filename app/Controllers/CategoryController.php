<?php

namespace App\Controllers;
require_once 'app/Models/Category.php';
use App\Models\Category;

class CategoryController
{
    public static function index()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $categories = Category::all();
        require_once ('app/Views/category/index.php');

    }

    public static function create()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        require_once ('app/Views/category/create.php');
    }


    public static function store()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $data = $_POST;
        $category = Category::create($data);
        if ($category){
            header('Location: /categories');
        }
    }

    public static function destroy($id)
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $category = Category::delete($id);
        if ($category){
            header('Location: /categories');
        }
    }



}