<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conexion = new mysqli("localhost", "root", "", "gestion_notas");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM notas";
$result = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Listado de Notas</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Listado de Notas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estudiante</th>
                    <th>Materia</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Definitiva</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nombre']}</td>
                                <td>{$row['estudiante']}</td>
                                <td>{$row['materia']}</td>
                                <td>{$row['nota1']}</td>
                                <td>{$row['nota2']}</td>
                                <td>{$row['nota3']}</td>
                                <td>{$row['definitiva']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay notas registradas</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conexion->close();
?>
