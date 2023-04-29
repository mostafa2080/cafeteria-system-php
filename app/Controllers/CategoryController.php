<?php

namespace App\Controllers;
require_once 'app/Models/Category.php';
use App\Models\Category;

class CategoryController
{
    public static function index()
    {
        $categories = Category::all();
        var_dump($categories);
        require_once ('app/Views/category/index.php');

    }

    public static function create()
    {
        require_once ('app/Views/category/create.php');
    }


    public static function store()
    {
        $data = $_POST;
        $category = Category::create($data);
        if ($category){
            header('Location: /categories');
        }
    }

    public static function destroy($id)
    {
        $category = Category::delete($id);
        if ($category){
            header('Location: /categories');
        }
    }



}