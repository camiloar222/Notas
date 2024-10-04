<?php
$conexion = new mysqli("localhost", "root", "", "gestion_notas");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$result = $conexion->query("SELECT * FROM notas");

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['nombre']}</td>";
    echo "<td>{$row['estudiante']}</td>";
    echo "<td>{$row['materia']}</td>";
    echo "<td>{$row['nota1']}</td>";
    echo "<td>{$row['nota2']}</td>";
    echo "<td>{$row['nota3']}</td>";
    echo "<td>" . number_format($row['definitiva'], 2) . "</td>";
    echo "</tr>";
}

$conexion->close();
?>
