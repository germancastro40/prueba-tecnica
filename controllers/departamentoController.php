<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
}
include_once BASE_PATH . 'config/Database.php';
include_once BASE_PATH . 'models/Departamento.php';

class DepartamentoController {
    private $departamentoModel;

    public function __construct($conn) {
        $this->departamentoModel = new Departamento($conn);
    }

    public function crearDepartamento($nombre) {
        return $this->departamentoModel->crearDepartamento($nombre);
    }

    public function obtenerDepartamentos() {
        return $this->departamentoModel->obtenerDepartamentos();
    }

    public function obtenerDepartamentoPorId($id) {
        return $this->departamentoModel->obtenerDepartamentoPorId($id);
    }

    public function actualizarDepartamento($id, $nombre) {
        return $this->departamentoModel->actualizarDepartamento($id, $nombre);
    }

    public function eliminarDepartamento($id) {
        return $this->departamentoModel->eliminarDepartamento($id);
    }

    public function obtenerDepartamentosPaginado($pagina, $registrosPorPagina) {
        $offset = ($pagina - 1) * $registrosPorPagina;
        return $this->departamentoModel->obtenerDepartamentosPaginado($offset, $registrosPorPagina);
    }

    public function contarDepartamentos() {
        return $this->departamentoModel->contarDepartamentos();
    }
}
?>
