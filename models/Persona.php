<?php
class Persona {
    private $conn;
    private $table_name = "personas";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function crearPersona($nombre, $departamento_id) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, departamento_id) VALUES (:nombre, :departamento_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':departamento_id', $departamento_id);
        return $stmt->execute();
    }

    public function obtenerPersonas() {
        $query = "SELECT p.id, p.nombre, d.nombre AS departamento FROM " . $this->table_name . " p JOIN departamentos d ON p.departamento_id = d.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPersonaPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarPersona($id, $nombre, $departamento_id) {
        $query = "UPDATE " . $this->table_name . " SET nombre = :nombre, departamento_id = :departamento_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':departamento_id', $departamento_id);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function eliminarPersona($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function obtenerPersonasPaginado($offset, $limit) {
        $query = "SELECT p.id, p.nombre, d.nombre AS departamento FROM " . $this->table_name . " p JOIN departamentos d ON p.departamento_id = d.id LIMIT :offset, :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contarPersonas() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
?>
