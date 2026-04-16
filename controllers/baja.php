<?php
require_once "../funciones/conexion.php";
$conexion = conectarDB();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("ID de producto inválido");
}

$stmt = mysqli_prepare($conexion, "UPDATE productos SET estado = 0 WHERE id_producto = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: ../paginabotas.php?msg=baja_ok");
    exit;
} else {
    echo "Error al ocultar";
}

mysqli_close($conexion);