<?php
session_start();
include_once '../config/database.php';
include_once '../controllers/DepartamentoController.php';

$database = new Database();
$conn = $database->getConnection();
$departamentoController = new DepartamentoController($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $departamentoController->eliminarDepartamento($id);

    header("Location: ../views/departamentos/main.php");
    exit();
}
?>
