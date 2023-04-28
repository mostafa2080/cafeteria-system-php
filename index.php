<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'app/Controllers/ProductController.php';
use App\Controllers\ProductController;
$path = $_SERVER['PATH_INFO'];
$queryString = isset($_SERVER['QUERY_STRING']) ? explode('=', $_SERVER['QUERY_STRING']) : [];
//var_dump($queryString);

switch ($path) {
    case '/products':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            ProductController::index();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            ProductController::store();
        }
        break;
    case '/product/create':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            ProductController::create();
        }
        break;
    case '/product/show':
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $queryString[1] != null) {
            ProductController::show($queryString[1]);
        }
        break;
    case '/product/edit':
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $queryString[1] != null) {
            ProductController::edit($queryString[1]);
        }
        break;
    case '/product/delete':
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $queryString[1] != null) {
            ProductController::destroy($queryString[1]);
        }
        break;
    case '/product/store':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            ProductController::store();
        }
        break;
    case '/product/update':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            ProductController::update();
        }
        break;
    default:
        echo '404';
        break;
}
?>
