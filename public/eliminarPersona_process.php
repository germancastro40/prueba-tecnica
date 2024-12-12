<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
session_start();
include_once '../config/database.php';
include_once '../controllers/PersonaController.php';

$database = new Database();
$conn = $database->getConnection();
$personaController = new PersonaController($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $personaController->eliminarPersona($id);

    header("Location: ../views/personas/main.php");
    exit();
}
?>
