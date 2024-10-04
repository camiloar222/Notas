<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conexion = new mysqli("localhost", "root", "", "gestion_notas");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $estudiante = $_POST['estudiante'];
    $materia = $_POST['materia'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

  
    $_SESSION['notas'][] = [
        'nombre' => $nombre,
        'estudiante' => $estudiante,
        'materia' => $materia,
        'nota1' => $nota1,
        'nota2' => $nota2,
        'nota3' => $nota3
    ];

    echo "Nota guardada temporalmente. Puedes confirmar o cancelar la operación.";
    header("Location: index.html");
}

$conexion->close();
?>
