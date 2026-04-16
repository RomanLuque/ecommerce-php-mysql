<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<?php
include "funciones/conexion.php";

$conexion = conectarDB();

$query = mysqli_query($conexion, "SELECT * FROM productos WHERE id_categoria = 2 AND estados = 1");
?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda - mujer</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="body-mujer">

<nav class="barra-navegacion">
  <ul>
    <li><a href="paginainfantil.php">Infantil</a></li>
    <li><a href="hombre.php">Hombre</a></li>
    <li><a href="paginamujer.php" class="activo">Mujer</a></li>
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

  <div class="contenedor">
    <aside class="filtros">
      <h3>Filtros</h3>
      <div class="boton-paginainfantil">
        <button>Categoría</button>
        <button>Color</button>
        <button>Tipo</button>
        <button>Género</button>
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
  <div class="contenedor-video">
    <div class="video-wrapper">
      <h1>Zona Outfit - Moda Mujer</h1>
       <div class="info-destacada">
        <p>
          En nuestra colección de ropa para mujer encontrarás variedad de estilos que combinan
          comodidad y tendencia. Desde buzos y camperas ideales para los días fríos, hasta
          remeras, pantalones y shorts diseñados para lucir fresca y con estilo.  
          Cada prenda está pensada para acompañar tu día a día con la mejor calidad y confort.
        </p>
      </div>
      <video controls autoplay muted loop>
        <source src="fotos/ropa de mujer/Vídeo promocional para marca de ropa. Lonely - Sergio Bugo filmmaker y vídeos (720p, h264).mp4" type="video/mp4">
    </video>
  </div>
  </div>

  
<section class="tabla-talles">
  <h1>Tabla de Talles al Detalle</h1>
  <table>
    <thead>
      <tr>
        <th>Talle</th>
        <th>Edad aprox.</th>
        <th>Altura (cm)</th>
        <th>Peso (kg)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>S</td>
        <td>16 años</td>
        <td>110 - 120</td>
        <td>45 - 50</td>
      </tr>
      <tr>
        <td>M</td>
        <td>18 años</td>
        <td>120 - 140</td>
        <td>50 - 60</td>
      </tr>
      <tr>
        <td>L</td>
        <td>20 años</td>
        <td>140 - 160</td>
        <td>60 - 70</td>
      </tr>
      <tr>
        <td>XL</td>
        <td>20 - 25 años</td>
        <td>160 - 180</td>
        <td>70 - 80</td>
      </tr>
      <tr>
        <td>XXL</td>
        <td>25 - +30 años</td>
        <td>180 - 190</td>
        <td>80 - 90</td>
      </tr>
    </tbody>
  </table>
</section>


  
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
