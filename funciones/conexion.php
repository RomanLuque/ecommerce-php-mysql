<?php
function conectarDB() {
    $servidor   = "localhost";
    $usuario    = "root";
    $contrasenia = "";
    $baseDeDatos = "zonaoutfit"; // ← TU BASE DE DATOS ÚNICA

    $conexion = mysqli_connect($servidor, $usuario, $contrasenia, $baseDeDatos,3306);

    if (!$conexion) {
        die("❌ Error de conexión: " . mysqli_connect_error());
    }

    return $conexion;
}
?>