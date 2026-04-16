<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "funciones/conexion.php";
    $conexion = conectarDB();

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Buscar usuario por email
    $stmt = mysqli_prepare($conexion, "SELECT id_usuario, nombre, apellido, rol, contrasena FROM usuarios WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($result)) {
        // Verificar contraseña (texto plano por ahora)
        if ($password == $fila['contrasena']) {
            // Crear sesión
            $_SESSION['usuario_id'] = $fila['id_usuario'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['apellido'] = $fila['apellido'];
            $_SESSION['rol'] = $fila['rol'];
            
            header("Location: paginaprincipal.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "El email no está registrado";
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Zona Outfit</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="pagina-login">
    <div class="contenedor-login">
        <div class="caja-login">
            <h1 class="logo-login">Zona Outfit</h1>
            
            <?php if ($error): ?>
                <p style="color: red; background: #ffe6e6; padding: 10px; border-radius: 5px; margin-bottom: 15px;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="index.php" method="post">
                <input type="email" name="email" class="campo-login" placeholder="Correo electrónico" required>
                <input type="password" name="password" class="campo-login" placeholder="Contraseña" required>
                <button type="submit" class="boton-principal">Iniciar sesión</button>
            </form>

            <a href="Rcontraseña.php" class="enlace-login">¿Olvidaste tu contraseña?</a>
            <hr class="separador-login">
            <a href="crearcuenta.php" class="boton-secundario">Crear cuenta nueva</a>
        </div>
    </div>
</body>
</html>