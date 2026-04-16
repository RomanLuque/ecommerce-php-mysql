<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SESSION['rol'] != 'admin') {
    header("Location: paginaprincipal.php");
    exit;
}

include "funciones/conexion.php";
$conexion = conectarDB();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("ID de producto inválido");
}

$sql = "SELECT * FROM productos WHERE id_producto = $id";
$result = mysqli_query($conexion, $sql);
$producto = mysqli_fetch_assoc($result);
if (!$producto) {
    die("Producto no encontrado");
}

$categorias = mysqli_query($conexion, "SELECT * FROM categoria");
$generos    = mysqli_query($conexion, "SELECT * FROM generos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-infantil">
<nav class="barra-navegacion">
  <ul>
    <li><a href="paginainfantil.php">Infantil</a></li>
    <li><a href="hombre.php">Hombre</a></li>
    <li><a href="paginamujer.php">Mujer</a></li>
    <li><a href="paginacasual.php">Casual</a></li>
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
<h1>Modificar producto</h1>
<a href="paginabotas.php">Volver</a>

<form action="controllers/modificar.php" method="post">
    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">

    <label>Nombre:
        <input type="text" name="nombre" required
               value="<?php echo htmlspecialchars($producto['nombre']); ?>">
    </label><br>

    <label>Descripción:
        <input type="text" name="descripcion"
               value="<?php echo htmlspecialchars($producto['descripcion']); ?>">
    </label><br>

    <label>Precio:
        <input type="number" step="0.01" min="0" name="precio" required
               value="<?php echo $producto['precio']; ?>">
    </label><br>

    <label>Stock:
        <input type="number" min="0" name="stock" required
               value="<?php echo $producto['stock']; ?>">
    </label><br>

    <label>Categoría:
        <select name="id_categoria" required>
            <?php while ($c = mysqli_fetch_assoc($categorias)): ?>
                <option value="<?php echo $c['id_categoria']; ?>"
                    <?php if ($c['id_categoria'] == $producto['id_categoria']) echo "selected"; ?>>
                    <?php echo htmlspecialchars($c['categoria']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </label><br>

    <label>Género:
        <select name="id_genero" required>
            <?php while ($g = mysqli_fetch_assoc($generos)): ?>
                <option value="<?php echo $g['id_genero']; ?>"
                    <?php if ($g['id_genero'] == $producto['id_genero']) echo "selected"; ?>>
                    <?php echo htmlspecialchars($g['genero']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </label><br>

    <label>Talle:
        <input type="text" name="talle"
               value="<?php echo htmlspecialchars($producto['talle']); ?>">
    </label><br>

    <label>Ruta de imagen:
        <input type="text" name="imagen"
               value="<?php echo htmlspecialchars($producto['imagen']); ?>">
    </label><br>

    <button type="submit">Guardar cambios</button>
</form> <br><br><br>

  <footer class="footer-tabla">
  <table>
    <tr>
      <td>
        <h3>INFORMACIÓN</h3>
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Sobre nosotros</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="#">¿Dónde estamos?</a></li>
          <li><a href="#">Datos bancarios</a></li>
          <li><a href="#">Políticas de privacidad</a></li>
          <li><a href="#">Políticas de cookies</a></li>
          <li><a href="#">Noticias y novedades</a></li>
          <li><a href="#">Servicio técnico</a></li>
          <li><a href="#">Ayuda</a></li>
        </ul>
      </td>

      <td>
        <h3>ZonaOutfit</h3>
        <p>En las redes</p>
        <div class="footer-social">
          <a href="https://www.facebook.com/"><img src="fotos/logos/logo_facebook.png" alt="Facebook"></a>
          <a href="https://www.instagram.com/"><img src="fotos/logos/logo_instagram.png" id="ytlogo" alt="Instagram"></a>
          <a href="https://www.YouTube.com/"><img src="fotos/logos/logo_youtube.png" alt="YouTube"></a>
        </div>
      </td>


      <td>
        <h3>¿DÓNDE ESTAMOS?</h3>
        <p>Cramer 470, B1876CZJ Bernal, Provincia de Buenos Aires</p>
        <p>📞 Lunes a Viernes 17:40 a 21:05hs.<br></p>
        <p>📧 ZonaOutfit@gmail.com</p>
        <div class="footer-pagos">
          <img src="fotos/logos/Logo_visa.png" alt="Visa">
          <img src="fotos/logos/logo_mastercard.png" alt="Mastercard">
          <img src="fotos/logos/logo_americanexpress.png" alt="American Express">
          <img src="fotos/logos/logo_mercadopago.png" alt="Mercado Pago">
        </div>
      </td>

      <td>
        <h3>NEWSLETTER</h3>
        <p>Recibí ofertas en tu email</p>
        <form>
          <input type="text" placeholder="Nombre">
          <input type="email" placeholder="Email">
          <button type="submit">Suscribirme</button>
        </form>
      </td>
    </tr>
  </table>

  <div class="footer-bottom">
    <p>&copy; 2025 ZonaOutfit - Todos los derechos reservados.</p>
    <p>Hecho por: Roman luque, Lautaro berutti, Luciano rubino y Jesus coronado</p>
  </div>
</footer>


</body>
</html>
<?php mysqli_close($conexion); ?>