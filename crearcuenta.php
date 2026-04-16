<?php
session_start();

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "funciones/conexion.php";
    $conexion = conectarDB();

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $telefono = trim($_POST['telefono']);

    // Verificar si el email ya existe
    $check = mysqli_prepare($conexion, "SELECT id_usuario FROM usuarios WHERE email = ?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    $checkResult = mysqli_stmt_get_result($check);

    if (mysqli_fetch_assoc($checkResult)) {
        $error = "El email ya está registrado";
    } else {
        // Insertar usuario (contraseña en texto plano por ahora)
        $stmt = mysqli_prepare($conexion, "INSERT INTO usuarios (nombre, apellido, email, contrasena, telefono, rol) VALUES (?, ?, ?, ?, ?, 'cliente')");
        mysqli_stmt_bind_param($stmt, "sssss", $nombre, $apellido, $email, $password, $telefono);

        if (mysqli_stmt_execute($stmt)) {
            $success = "Cuenta creada correctamente. ¡Ya podés iniciar sesión!";
        } else {
            $error = "Error al crear la cuenta";
        }
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Zona Outfit</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="pagina-login">
    <div class="contenedor-login">
        <div class="caja-login">
            <h2 class="logo-login">Zona Outfit</h2>

            <?php if ($error): ?>
                <p style="color: red; background: #ffe6e6; padding: 10px; border-radius: 5px; margin-bottom: 15px;"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <p style="color: green; background: #e6ffe6; padding: 10px; border-radius: 5px; margin-bottom: 15px;"><?php echo $success; ?></p>
            <?php endif; ?>

            <form action="crearcuenta.php" method="post">
                <input type="text" name="nombre" class="campo-login" placeholder="Nombre" required>
                <input type="text" name="apellido" class="campo-login" placeholder="Apellido" required>
                <input type="email" name="email" class="campo-login" placeholder="Correo electrónico" required>
                <input type="password" name="password" class="campo-login" placeholder="Contraseña" required>
                <input type="tel" name="telefono" class="campo-login" placeholder="Número de teléfono" required>
                <button type="submit" class="boton-principal">Crear cuenta</button>
            </form>

            <a href="index.php" class="enlace-login">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</body>
</html>