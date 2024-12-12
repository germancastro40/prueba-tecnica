<?php
class Menu {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerMenu() {
        $query = "SELECT * FROM menu ORDER BY orden";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $menu = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $menu[] = $row;
        }

        return $menu;
    }
}
?>
