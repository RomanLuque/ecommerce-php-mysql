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

$sql = "SELECT p.*, c.categoria, g.genero
        FROM productos p
        JOIN categoria c ON p.id_categoria = c.id_categoria
        JOIN generos   g ON p.id_genero    = g.id_genero
        ORDER BY p.id_producto DESC";
$productos = mysqli_query($conexion, $sql);

$categorias = mysqli_query($conexion, "SELECT * FROM categoria");
$generos    = mysqli_query($conexion, "SELECT * FROM generos");

$mensaje = "";
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === "alta_ok")   $mensaje = "Producto agregado correctamente.";
    if ($_GET['msg'] === "baja_ok")   $mensaje = "Producto eliminado correctamente.";
    if ($_GET['msg'] === "modif_ok")  $mensaje = "Producto modificado correctamente.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tienda - calzado deport</title>
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
    <li><a href="paginabotas.php" class="activo">CRUD</a></li>
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

<h1>Administrar productos</h1>

<?php if ($mensaje): ?>
    <p style="color: green;"><?php echo $mensaje; ?></p>
<?php endif; ?>

<h2>Listado</h2>
<table border="10" cellpadding="5" cellspacing="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Género</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Talle</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($p = mysqli_fetch_assoc($productos)): ?>
        <tr>
            <td><?php echo $p['id_producto']; ?></td>
            <td><?php echo htmlspecialchars($p['nombre']); ?></td>
            <td><?php echo htmlspecialchars($p['categoria']); ?></td>
            <td><?php echo htmlspecialchars($p['genero']); ?></td>
            <td>$<?php echo number_format($p['precio'], 2, ',', '.'); ?></td>
            <td><?php echo $p['stock']; ?></td>
            <td><?php echo htmlspecialchars($p['talle']); ?></td>
            <td>
                <?php if ($p['imagen']): ?>
                    <img src="<?php echo $p['imagen']; ?>" alt="" style="width:60px;">
                <?php endif; ?>
            </td>
            <td>
                <a href="modificarProducto.php?id=<?php echo $p['id_producto']; ?>">Modificar</a>
                |
                <a href="funciones/baja.php?id=<?php echo $p['id_producto']; ?>"
                   onclick="return confirm('¿Eliminar este producto?');">
                   Eliminar
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<h2>Alta de producto</h2>
<form action="controllers/alta.php" method="post">
    <label>Nombre:
        <input type="text" name="nombre" required>
    </label><br>

    <label>Descripción:
        <input type="text" name="descripcion">
    </label><br>

    <label>Precio:
        <input type="number" step="0.01" min="0" name="precio" required>
    </label><br>

    <label>Stock:
        <input type="number" min="0" name="stock" required>
    </label><br>

    <label>Categoría:
        <select name="id_categoria" required>
            <option value="">-- seleccionar --</option>
            <?php while ($c = mysqli_fetch_assoc($categorias)): ?>
                <option value="<?php echo $c['id_categoria']; ?>">
                    <?php echo htmlspecialchars($c['categoria']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </label><br>

    <label>Género:
        <select name="id_genero" required>
            <option value="">-- seleccionar --</option>
            <?php while ($g = mysqli_fetch_assoc($generos)): ?>
                <option value="<?php echo $g['id_genero']; ?>">
                    <?php echo htmlspecialchars($g['genero']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </label><br>

    <label>Talle:
        <input type="text" name="talle">
    </label><br>

    <label>Ruta de imagen:
        <input type="text" name="imagen" placeholder="fotos/infantil/enteronene.png">
    </label><br>

    <button type="submit">Guardar producto</button>
</form>


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
<?php mysqli_close($conexion); ?>