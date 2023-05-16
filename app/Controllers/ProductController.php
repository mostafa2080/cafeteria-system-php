<?php

namespace App\Controllers;

require_once 'app/Models/Product.php';
require_once 'app/Models/Category.php';

use App\Models\Product;
use App\Models\Category;

class ProductController
{
    public static function index()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $products = Product::all();

        require_once('app/Views/product/index.php');
    }
    public static function home()
    {
       
        $products = Product::all();

        require_once('app/Views/product/home.php');
    }
    public static function order()
    {
       
        $products = Product::all();

        require_once('app/Views/product/order.php');
    }

    public static function create()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        require_once('app/Views/product/create.php');
    }

    public static function show($id)
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $product = Product::find($id);
        $category = Category::find($product->categoryID) ; 
        require_once('app/Views/product/show.php');
    }

    public static function store()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $data = $_POST;
        $errors = []; // array to store validation errors
    
        // Validate form fields
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate name field
            if (empty($_POST['name'])) {
                $errors[] = 'Name is required';
            }
    
            // Validate price field
            if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
                $errors[] = 'Price is required and should be a number';
            }
    
            // Validate status field
            if (empty($_POST['status'])) {
                $errors[] = 'Status is required';
            }
    
            // Validate category ID field
            if (empty($_POST['categoryID']) || !is_numeric($_POST['categoryID'])) {
                $errors[] = 'Category ID is required and should be a number';
            }
        }
    
        // Validate image field
        if (empty($_FILES['image']['tmp_name'])) {
            $errors[] = 'Image is required';
        } else {
            $allowed_extensions = ['png', 'jpg', 'jpeg', 'gif'];
            $image_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (!in_array($image_extension, $allowed_extensions)) {
                $errors[] = 'Only PNG, JPG, JPEG, and GIF images are allowed';
            }
            if ($_FILES['image']['size'] > 2000000) {
                $errors[] = 'Image size cannot exceed 2MB';
            }
        }
    
        if (empty($errors)) {
            // Save image
            $image = $_FILES['image'];
            $image_name = time() . '-' . $image['name'];
            $image_tmp = $image['tmp_name'];
            move_uploaded_file($image_tmp, 'public/images/' . $image_name);
            $data['image'] = $image_name;
    
            // Create product
            $product = Product::create($data);
            if ($product) {
                header('Location: /products');
            }
        }
    
        // Display validation errors to the user
        if (!empty($errors)) {
            require_once('app/Views/product/create.php');
            echo '<div class="alert alert-danger">';
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }
    

    public static function edit($id)
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $product = Product::find($id);
        require_once('app/Views/product/edit.php');
    }

    public static function update()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /admin/login');
        }
        $data = $_POST;
    
        // Validate form fields
        $errors = []; // array to store validation errors
        if (empty($_POST['name'])) {
            $errors[] = 'Name is required';
        }
        if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
            $errors[] = 'Price is required and should be a number';
        }
        if (empty($_POST['status'])) {
            $errors[] = 'Status is required';
        }
        if (empty($_POST['categoryID']) || !is_numeric($_POST['categoryID'])) {
            $errors[] = 'Category ID is required and should be a number';
        }
    
        // Validate image field
        if ($_FILES['image']['name'] != null) {
            $allowed_extensions = ['png', 'jpg', 'jpeg', 'gif'];
            $image_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (!in_array($image_extension, $allowed_extensions)) {
                $errors[] = 'Only PNG, JPG, JPEG, and GIF images are allowed';
            }
            if ($_FILES['image']['size'] > 2000000) {
                $errors[] = 'Image size cannot exceed 2MB';
            }
        }
    
        if (empty($errors)) {
            $product = Product::find($data['id']);
            // check if image is uploaded
            if ($_FILES['image']['name'] != null) {
                // save image
                $image = $_FILES['image'];
                $image_name = time() . '-' . $image['name'];
                $image_tmp = $image['tmp_name'];
                move_uploaded_file($image_tmp, 'public/images/' . $image_name);
                // delete old image
                unlink('public/images/' . $product->image);
                $data['image'] = $image_name;
            } else {
                $data['image'] = $product->image;
            }
    
            $product = Product::update($data);
    
            if ($product) {
                header('Location: /products');
            }
        }
    
        // Display validation errors to the user
        if (!empty($errors)) {
            $product = Product::find($data['id']);
            require_once('app/Views/product/edit.php');
            echo '<div class="alert alert-danger">';
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }
    


    public static function destroy($id)
{
    if (!isset($_SESSION['admin'])){
        header('Location: /admin/login');
    }
    $product = Product::find($id);
    if($product) {
        Product::delete($id);
        unlink('public/images/' . $product->image);
        header('Location: /products');
    }
    else {
        // product not found
        echo "Product not found";
    }
}




}

