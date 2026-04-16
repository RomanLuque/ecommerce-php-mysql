<?php
require_once "../funciones/conexion.php";
$conexion = conectarDB();

$id = isset($_POST['id_producto']) ? (int)$_POST['id_producto'] : 0;
if ($id <= 0) {
    die("ID de producto inválido");
}

$nombre      = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio      = $_POST['precio'];
$stock       = $_POST['stock'];
$categoria   = $_POST['id_categoria'];
$genero      = $_POST['id_genero'];
$talle       = $_POST['talle'];
$imagen      = $_POST['imagen'];

$stmt = mysqli_prepare($conexion, "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?, id_categoria = ?, id_genero = ?, talle = ?, imagen = ? WHERE id_producto = ?");
mysqli_stmt_bind_param($stmt, "ssdiisssi", $nombre, $descripcion, $precio, $stock, $categoria, $genero, $talle, $imagen, $id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: ../paginabotas.php?msg=modificacion_ok");
    exit;
} else {
    echo "Error al modificar";
}

mysqli_close($conexion);