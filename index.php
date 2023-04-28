<?php
 include 'app/Views/Layout-top.php';
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'app/Controllers/UserController.php';
use App\Controllers\UserController;
$path = explode('.', $_SERVER['REQUEST_URI']);

// User routes

UserController::create();


?>
<?php
 include 'app/Views/Layout-bot.php';
?>