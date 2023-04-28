
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'app/Controllers/UserController.php';
use App\Controllers\UserController;
$path = $_SERVER['PATH_INFO'];

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
    case '/users/edit':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            UserController::edit($path[2]);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            UserController::update();
        }
        break;
    case '/users/delete':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            UserController::destroy($path[2]);
        }
        break;
    case '/users/store':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            UserController::store();
        }
        break;
    default:
        echo '404 Page not Found';
        break;
}




?>
