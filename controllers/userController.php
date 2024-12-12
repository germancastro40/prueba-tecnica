<?php
include_once '../config/database.php';
include_once '../models/User.php';

class UserController {
    private $db;
    public $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register($nombre, $email, $contrasena) {
        $this->user->nombre = $nombre;
        $this->user->email = $email;
        $this->user->contrasena = $contrasena;

        if ($this->user->isEmailExist()) {
            return "Email ya está en uso.";
        }

        if ($this->user->register()) {
            return true;
        }

        return "Error al registrar el usuario.";
    }

    public function login($email, $contrasena) {
        $this->user->email = $email;
        $this->user->contrasena = $contrasena;
        return $this->user->login();
    }
}
?>
