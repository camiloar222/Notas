<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conexion = new mysqli("localhost", "root", "", "gestion_notas");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Comprobar si hay notas en la sesión
if (isset($_SESSION['notas'])) {
    // Iniciar transacción
    $conexion->begin_transaction();

    // Preparar consulta SQL
    $sql = "INSERT INTO notas (nombre, estudiante, materia, nota1, nota2, nota3) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta SQL: " . $conexion->error);
    }

    // Vincular parámetros y ejecutar para cada nota
    foreach ($_SESSION['notas'] as $nota) {
        $stmt->bind_param("sssddd", $nota['nombre'], $nota['estudiante'], $nota['materia'], $nota['nota1'], $nota['nota2'], $nota['nota3']);
        if (!$stmt->execute()) {
            $conexion->rollback(); // Deshacer la transacción en caso de error
            echo "Error en la ejecución de la consulta: " . $stmt->error;
            exit;
        }
    }

    // Confirmar la transacción
    $conexion->commit();
    echo "Notas guardadas correctamente.";
    unset($_SESSION['notas']); // Limpiar la sesión después de guardar
    header("Location: index.html?status=success");
} else {
    echo "No hay notas para guardar.";
}

$stmt->close();
$conexion->close();
?>
