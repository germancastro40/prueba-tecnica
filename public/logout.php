<?php
session_start();
session_destroy();
header("Location: /pruebaTecnica/views/login.php");
?>
