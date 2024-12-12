<?php
include_once BASE_PATH . 'models/Menu.php';

class MenuController {
    private $menuModel;

    public function __construct($conn) {
        $this->menuModel = new Menu($conn);
    }

    public function mostrarMenu() :array{
        return $this->menuModel->obtenerMenu();
    }
}
?>
