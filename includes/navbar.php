<?php
include BASE_PATH . 'config/database.php';
include BASE_PATH . '/controllers/menuController.php';

if (!isset($_SESSION['nombre'])) {
    header("Location: /pruebaTecnica/views/login.php");
    exit();
}

$database = new Database();
$conn = $database->getConnection();
$menuController = new MenuController($conn);
$menuItems = $menuController->mostrarMenu();

if (!isset($menuItems)) {
    $menuItems = [];
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"> <span class="navbar-toggler-icon"></span> </button>
        <p class="navbar-brand mb-0">Bienvenido, <?= $_SESSION['nombre'] ?>!</p>
        <div class="collapse navbar-collapse d-none d-lg-block">
            <ul class="navbar-nav ms-auto"> <?php foreach ($menuItems as $item): ?> 
                <li class="nav-item"> 
                    <a class="nav-link" href="<?= $item['url'] ?>"> <?= $item['nombre'] ?> </a> 
                </li> <?php endforeach; ?> 
                <li class="nav-item"> 
                    <a class="nav-link btn btn-danger text-white ms-lg-3" href="/pruebaTecnica/public/logout.php">Cerrar Sesión</a> 
                </li>
            </ul>
        </div>
    </div>
</nav> <!-- Menú lateral offcanvas (visible en pantallas pequeñas) -->
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5> <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav"> <?php foreach ($menuItems as $item): ?> <li class="nav-item"> <a class="nav-link" href="<?= $item['url'] ?>"> <?= $item['nombre'] ?> </a> </li> <?php endforeach; ?> </ul>
    </div>
</div>
<style>
    .navbar {
        padding: 0.5rem 1rem;
    }

    .offcanvas-start {
        transition: transform 0.3s ease-in-out;
    }

    @media (min-width: 992px) {
        .offcanvas-start {
            display: none;
        }
    }

    @media (min-width: 992px) {
        .navbar-nav .nav-item {
            margin-left: 1rem;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            font-weight: 500;
        }

        .navbar-nav .btn-danger {
            font-size: 0.9rem;
            padding: 0.4rem 0.8rem;
        }
    }
</style>