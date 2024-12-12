<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: /pruebaTecnica/views/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Departamento</title>
</head>
<body>
    <?php include '../../includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1>Crear Departamento</h1>
        <form action="../../public/createDepartamento_process.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
