<?php
 include 'app/Views/Layout-top.php';
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

var_dump($_SERVER['REQUEST_URI']);

require_once 'app/Controllers/UserController.php';
use App\Controllers\UserController;

$user = new UserController();
$user->index();
var_dump($user->index());
?>
<?php
 include 'app/Views/Layout-bot.php';
?>