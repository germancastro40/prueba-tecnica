<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
session_start();
include_once BASE_PATH . 'controllers/UserController.php';


$nombre     = $_POST['nombre'];
$email      = $_POST['email'];
$contrasena = $_POST['contrasena'];

$userController = new UserController();
$registrationResult = $userController->register($nombre, $email, $contrasena);

if ($registrationResult === true) {
    $_SESSION['nombre'] = $nombre;
    header("Location: ../views/dashboard.php");
    exit();
} else {
    $_SESSION['register_error'] = $registrationResult;
    header("Location: ../views/register.php");
    exit();
}
?>
