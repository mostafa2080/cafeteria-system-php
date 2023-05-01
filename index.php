<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'app/Controllers/UserController.php';
require_once 'app/Controllers/ProductController.php';
require_once 'app/Controllers/AdminController.php';
require_once 'app/Controllers/CategoryController.php';
require_once 'app/Controllers/CheckController.php';

use App\Controllers\UserController;
use App\Controllers\CategoryController;
use App\Controllers\CheckController;
use App\Controllers\AdminController;
use App\Controllers\ProductController;

$path = $_SERVER['PATH_INFO'];
// get queryString from url
$queryString = isset($_SERVER['QUERY_STRING']) ? explode('=', $_SERVER['QUERY_STRING']) : [];
//var_dump($queryString);

switch ($path) {
    case '/users':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            UserController::index();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            UserController::store();
        }
        break;
    case '/users/create':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            UserController::create();
        }
        break;
    case '/users/show':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            UserController::show($path[2]);
        }
        break;
    case '/users/edit/':
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $queryString[1] != null) {
            UserController::edit($queryString[1]);
        }
        break;
    case '/users/delete/':
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $queryString[1] != null) {
            UserController::destroy($queryString[1]);
        }
        break;
    case '/users/store':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            UserController::store();
        }
        break;
    case '/users/update':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            UserController::update();
        }
        break;
    case '/users/reset/':
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $queryString[1] != null) {
            UserController::ResetPassword($queryString[1]);
        }
        break;
    case '/admin/login':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            AdminController::login();
        }
        break;
    case '/admin/check':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            AdminController::check();
        }
        break;
    case '/admin/logout':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            AdminController::logout();
        }
        break;
        
      //categories routes
      
    case '/categories':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // var_dump($_SERVER);
            CategoryController::index();
        }
        break;
      case '/categories/create':
          if ($_SERVER['REQUEST_METHOD'] == 'GET') {
              CategoryController::create();
          }
          break;
    case '/categories/delete/':
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $queryString[1] != null) {
            CategoryController::destroy($queryString[1]);
        }
        break;
    case '/categories/store':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            CategoryController::store();
        }
        break;
    case '/checks':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            CheckController::index();
        }
        break;
            
        // Products
        
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
        case '/home':
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                ProductController::home();
            }
            break;
            case '/order':
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    ProductController::order();
                }
                break;
                case '':
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        ProductController::home();
                    }
                    break;
    default:
        echo '404 Page not Found';
    break;
}
// ?>

x`x`