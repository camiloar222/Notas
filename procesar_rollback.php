<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_SESSION['notas'])) {
    unset($_SESSION['notas']);
}

echo "Operación cancelada. Las notas no se guardaron.";
header("Location: index.html");
?>
