<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
session_start();
include_once '../config/database.php';
include_once '../controllers/DepartamentoController.php';

$database = new Database();
$conn = $database->getConnection();
$departamentoController = new DepartamentoController($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $departamentoController->actualizarDepartamento($id, $nombre);

    header("Location: ../views/departamentos/main.php");
    exit();
}
?>
