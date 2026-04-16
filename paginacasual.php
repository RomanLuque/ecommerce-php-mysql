<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

include "funciones/conexion.php";

$conexion = conectarDB();

$query = mysqli_query($conexion, "SELECT * FROM productos WHERE id_categoria = 4 AND estados = 1");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tienda - calzado deport</title>
        <link rel="stylesheet" href="styles.css">
</head>
<body class="body-calzado">

<nav class="barra-navegacion">
  <ul>
    <li><a href="paginainfantil.php">Infantil</a></li>
    <li><a href="hombre.php">Hombre</a></li>
    <li><a href="paginamujer.php">Mujer</a></li>
    <li><a href="paginacasual.php" class="activo">Casual</a></li>
    <li><a href="paginadeport.php">Deportivo</a></li>
    
    <?php if ($_SESSION['rol'] === 'admin'): ?>
    <li><a href="paginabotas.php">CRUD</a></li>
    <?php endif; ?>

    <li class="iconos-carrito-logout">
      <a href="carrito.php"><img src="fotos/logos/carrito-de-compras.png" alt="Carrito"></a>
      <a href="logout.php"><img src="fotos/logos/salida-de-emergencia.png" alt="Logout"></a>
    </li>
    

    <li class="zonaoutfit-boton">
      <a href="paginaprincipal.php">ZonaOutfit</a>
    </li>
  </ul>
</nav>

<div class="contenedor">
<aside class="filtros">
<h3>Filtros</h3>
<div class="boton-paginainfantil">
        <button>Categoría</button>
        <button>Disciplina</button>
        <button>Talle</button>
        <button>Rango de precio</button>
</div>
        </aside>
        <main class="productos">
          <?php while($row = mysqli_fetch_assoc($query)) { ?>
        <div class="tarjeta">
            <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>">
            <h4><?php echo $row['nombre']; ?></h4>
            <p>$<?php echo number_format($row['precio'], 0, ',', '.'); ?></p>
            <p>Talle: <?php echo $row['talle']; ?></p>
            <button>Agregar al carrito</button>
        </div>
    <?php } ?>
</main>
</div>

<footer class="foooter">
<div class="foooter-contenedor">
<!-- Columna 1 -->
<div class="foooter-columna">
<h3>ZonaOutfit</h3>
        <p>Tu tienda de confianza en calzados deportivos y casuales.</p>
        <p><strong>Dirección:</strong> Calle Falsa 123, La Plata</p>
        <p><strong>Teléfono:</strong> +54 221 123 4567</p>
        <p><strong>Email:</strong> contacto@zonaoutfit.com</p>
</div>

<!-- Columna 2 -->
<div class="foooter-columna">
        <h4>Enlaces útiles</h4>
<ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="hombre.php">Hombre</a></li>
        <li><a href="mujer.php">Mujer</a></li>
        <li><a href="infantil.php">Infantil</a></li>
        <li><a href="#">Política de privacidad</a></li>
        <li><a href="#">Términos y condiciones</a></li>
</ul>
</div>

<!-- Columna 3 -->
<div class="foooter-columna">
<h4>Seguinos</h4>
<div class="redes">
        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram"></a>
        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"></a>
</div>
</div>
</div>

<div class="foooter-copy">
        <p>&copy; 2025 ZonaOutfit - Todos los derechos reservados</p>
</div>
</footer>
</body>
</html>