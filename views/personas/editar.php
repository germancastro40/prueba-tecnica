<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: /pruebaTecnica/views/login.php");
    exit();
}

include_once '../../config/database.php';
include_once BASE_PATH . 'controllers/PersonaController.php';
include_once BASE_PATH . 'controllers/DepartamentoController.php';

$database = new Database();
$conn = $database->getConnection();
$personaController = new PersonaController($conn);
$departamentoController = new DepartamentoController($conn);

if (!isset($_GET['id'])) {
    header("Location: main.php");
    exit();
}

$id = $_GET['id'];
$persona = $personaController->obtenerPersonaPorId($id);
$departamentos = $departamentoController->obtenerDepartamentos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Persona</title>
</head>
<body>
    <?php include BASE_PATH . 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1>Editar Persona</h1>
        <form action="../../public/updatePersonas_process.php" method="post">
            <input type="hidden" name="id" value="<?= $persona['id'] ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $persona['nombre'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="departamento_id" class="form-label">Departamento</label>
                <select class="form-select" id="departamento_id" name="departamento_id" required>
                    <?php foreach ($departamentos as $departamento): ?>
                        <option value="<?= $departamento['id'] ?>" <?= $departamento['id'] == $persona['departamento_id'] ? 'selected' : '' ?>>
                            <?= $departamento['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
