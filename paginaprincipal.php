<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda Online</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="pagina-tienda">
  <!--Header -->
  <header class="encabezado-tienda">
    <div class="logo-tienda">Zona Outfit</div>
    <nav>
      <ul>
        <li><a href="paginainfantil.php">Infantil</a></li>
        <li><a href="paginamujer.php">Mujer</a></li>
        <li><a href="paginadeport.php">Deportivo</a></li>
        <li><a href="paginacasual.php">Casual</a></li>
    <?php if ($_SESSION['rol'] === 'admin'): ?>
    <li><a href="paginabotas.php">CRUD</a></li>
    <?php endif; ?>

    <li class="iconos-carrito-logout">
      <a href="carrito.php"><img src="fotos/logos/carrito-de-compras.png" alt="Carrito"></a>
      <a href="logout.php"><img src="fotos/logos/salida-de-emergencia.png" alt="Logout"></a>
    </li>
      </ul>
    </nav>
  </header>

  <!--Categorias principales -->
  <section class="categorias-tienda">
    <div class="categoria-tienda">
      <img src="principalvideooo.gif" class="foto-categoria" alt="Indumentaria">
      <h2>Indumentaria</h2>
      <div class="subcategorias-tienda">
        <a href="hombre.php">Hombre</a>
        <a href="paginamujer.php">Mujer</a>
        <a href="paginainfantil.php">Infantil</a>
      </div>
    </div>

    <div class="categoria-tienda">
      <img src="zapatillas_video.gif" class="foto-categoria" alt="Calzado">
      <h2>Calzado</h2>
      <div class="subcategorias-tienda">
        <a href="paginadeport.php">Deportivo</a>
        <a href="paginacasual.php">Casual</a>
      </div>
    </div>
  </section>

  <!--Footer -->
  <footer class="pie-tienda">
    <p>&copy; 2025 Zona Outfit - Todos los derechos reservados</p>
  </footer>
</body>
</html>