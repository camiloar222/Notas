<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conexion = new mysqli("localhost", "root", "", "gestion_notas");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->commit();
echo "Transacción confirmada exitosamente.";
$conexion->close();
?>
