<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
session_start();
include_once BASE_PATH . 'controllers/UserController.php';

$email       = $_POST['email'];
$contrasena  = $_POST['contrasena'];

$userController = new UserController();
if ($userController->login($email, $contrasena)) {
    $_SESSION['nombre'] = $userController->user->nombre;
    header("Location: ../views/dashboard.php");
    exit();
} else {
    $_SESSION['login_error'] = "Email o contraseña incorrectos.";
    header("Location: ../views/login.php");
    exit();
}
?>
