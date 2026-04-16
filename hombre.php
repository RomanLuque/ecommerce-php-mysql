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
  <title>Tienda - Hombres</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="Hombres">
<nav class="barra-navegacion">
  <ul>
    <li><a href="paginainfantil.php">Infantil</a></li>
    <li><a href="hombre.php" class="activo">Hombre</a></li>
    <li><a href="paginamujer.php">Mujer</a></li>
    <li><a href="paginacasual.php">Casual</a></li>
    <li><a href="paginadeport.php">Deportivo</a></li>
    
    <?php if ($_SESSION['rol'] === 'admin'): ?>
    <li><a href="paginabotas.php">CRUD</a></li>
    <?php endif; ?>
    <!-- Los dos íconos en un solo <li> -->
    <li class="iconos-carrito-logout">
      <a href="carrito.php"><img src="fotos/logos/carrito-de-compras.png" alt="Carrito"></a>
      <a href="logout.php"><img src="fotos/logos/salida-de-emergencia.png" alt="Logout"></a>
    </li>
    
    <!-- El botón de ZonaOutfit -->
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
      <button>Género</button>
      <button>Talle</button>
      <button>Rango de precio</button>
      </div>
    </aside>

    <main class="productos">
      <div class="tarjeta">
        <img src="fotos/hombre/conjuntoUrbano.png" alt="Conjunto Urbano">
        <h4>Conjunto Urbano</h4>
        <p>$39.000</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta">
        <img src="fotos/hombre/conjuntoFormal.png" alt="conjunto formal">
        <h4>Conjunto Formal</h4>
        <p>$59.000</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta">
        <img src="fotos/hombre/conjuntoInvierno.png" alt="Conjunto invierno">
        <h4>Conjunto Invierno</h4>
        <p>$49.000</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta">
        <img src="fotos/hombre/conjuntoVerano.png" alt="conjunto verano">
        <h4>Conjunto Verano</h4>
        <p>$39.000</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta">
        <img src="fotos/hombre/antiHéroe.png" alt="remera batman">
        <h4>Remera Héroe</h4>
        <p>$19.000</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta">
        <img src="fotos/hombre/remeraHéroe.png" alt="remera joker">
        <h4>Remera Anti-Héroe</h4>
        <p>$19.000</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta">
        <img src="fotos/hombre/remeraCampeón.png" alt="remera messi">
        <h4>Remera Campeón</h4>
        <p>$19.000</p>
        <button>Agregar al carrito</button>
      </div>

      <div class="tarjeta">
        <img src="fotos/hombre/remeraBandido.png" alt="remera shelby">
        <h4>Remera Bandido</h4>
        <p>$19.000</p>
        <button>Agregar al carrito</button>
      </div>
    </main>
  </div>

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