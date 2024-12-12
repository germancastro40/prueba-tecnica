<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
session_start();
include_once '../config/database.php';
include_once '../controllers/PersonaController.php';

$database = new Database();
$conn = $database->getConnection();
$personaController = new PersonaController($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $departamento_id = $_POST['departamento_id'];
    $personaController->actualizarPersona($id, $nombre, $departamento_id);

    header("Location: ../views/personas/main.php");
    exit();
}
?>
