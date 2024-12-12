<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pruebaTecnica/');
include_once BASE_PATH . 'models/Persona.php';

class PersonaController {
    private $personaModel;

    public function __construct($conn) {
        $this->personaModel = new Persona($conn);
    }

    public function crearPersona($nombre, $departamento_id) {
        return $this->personaModel->crearPersona($nombre, $departamento_id);
    }

    public function obtenerPersonas() {
        return $this->personaModel->obtenerPersonas();
    }

    public function obtenerPersonaPorId($id) {
        return $this->personaModel->obtenerPersonaPorId($id);
    }

    public function actualizarPersona($id, $nombre, $departamento_id) {
        return $this->personaModel->actualizarPersona($id, $nombre, $departamento_id);
    }

    public function eliminarPersona($id) {
        return $this->personaModel->eliminarPersona($id);
    }

    public function obtenerPersonasPaginado($pagina, $registrosPorPagina) {
        $offset = ($pagina - 1) * $registrosPorPagina;
        return $this->personaModel->obtenerPersonasPaginado($offset, $registrosPorPagina);
    }

    public function contarPersonas() {
        return $this->personaModel->contarPersonas();
    }
}
?>
