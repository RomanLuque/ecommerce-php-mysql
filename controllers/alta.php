<?php
require_once "../funciones/conexion.php";
$conexion = conectarDB();

$nombre      = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio      = $_POST['precio'];
$stock       = $_POST['stock'];
$categoria   = $_POST['id_categoria'];
$genero      = $_POST['id_genero'];
$talle       = $_POST['talle'];
$imagen      = $_POST['imagen'];

$stmt = mysqli_prepare($conexion, "INSERT INTO productos (nombre, descripcion, precio, stock, id_categoria, id_genero, talle, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssdiisss", $nombre, $descripcion, $precio, $stock, $categoria, $genero, $talle, $imagen);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: ../paginabotas.php?msg=alta_ok");
    exit;
} else {
    echo "Error al insertar";
}

mysqli_close($conexion);