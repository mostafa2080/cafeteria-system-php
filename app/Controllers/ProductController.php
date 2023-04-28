<?php

namespace App\Controllers;
require_once 'app/Models/Product.php';
use App\Models\Product;

class ProductController
{
    public static function index()
    {
        $products = Product::all();
        var_dump($products);

        require_once ('app/Views/product/index.php');

    }

    public static function create()
    {
        require_once ('app/Views/product/create.php');
    }

    public static function show($id)
    {
        $product = Product::find($id);
        require_once ('app/Views/product/show.php');
    }

    public static function store()
    {
        $data = $_POST;
        $product = Product::create($data);
        if ($product){
            header('Location: /products');
        }
    }

    public static function edit($id)
    {
        $product = Product::find($id);
        require_once ('app/Views/product/edit.php');
    }

    public static function update()
    {
        $data = $_POST;
        $product = Product::update($data);

        if ($product){
            header('Location: /products');
        }
    }

    public static function destroy($id)
    {
        $product = Product::delete($id);
        if ($product){
            header('Location: /products');
        }
    }


}