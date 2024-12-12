<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: /pruebaTecnica/views/login.php");
    exit();
}

include_once '../../config/database.php';
include_once '../../controllers/DepartamentoController.php';

$database = new Database();
$conn = $database->getConnection();
$departamentoController = new DepartamentoController($conn);

$departamentos = $departamentoController->obtenerDepartamentos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Persona</title>
</head>
<body>
    <?php include BASE_PATH . 'includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1>Crear Persona</h1>
        <form action="../../public/createPersonas_process.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="departamento_id" class="form-label">Departamento</label>
                <select class="form-select" id="departamento_id" name="departamento_id" required>
                    <?php foreach ($departamentos as $departamento): ?>
                        <option value="<?= $departamento['id'] ?>"><?= $departamento['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
