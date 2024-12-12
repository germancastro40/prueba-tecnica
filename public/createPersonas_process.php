<?php
session_start();
include_once '../config/database.php';
include_once '../controllers/PersonaController.php';

$database = new Database();
$conn = $database->getConnection();
$personaController = new PersonaController($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $departamento_id = $_POST['departamento_id'];
    
    try {
        $personaController->crearPersona($nombre, $departamento_id);
        header("Location: ../views/personas/main.php");
        exit();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
