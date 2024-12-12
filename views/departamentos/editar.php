<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: /pruebaTecnica/views/login.php");
    exit();
}

include_once '../../config/database.php';
include_once BASE_PATH . 'controllers/DepartamentoController.php';

$database = new Database();
$conn = $database->getConnection();
$departamentoController = new DepartamentoController($conn);

if (!isset($_GET['id'])) {
    header("Location: main.php");
    exit();
}

$id = $_GET['id'];
$departamento = $departamentoController->obtenerDepartamentoPorId($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Departamento</title>
</head>
<body>
    <?php include BASE_PATH . 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1>Editar Departamento</h1>
        <form action="../../public/updateDepartamento_process.php" method="post">
            <input type="hidden" name="id" value="<?= $departamento['id'] ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $departamento['nombre'] ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
