CREATE DATABASE zonaoutfit;
USE zonaoutfit;

CREATE TABLE generos (
    id_genero INT AUTO_INCREMENT PRIMARY KEY,
    genero    VARCHAR(20) UNIQUE
);

INSERT INTO generos (genero) VALUES
('Nene'),     -- 1
('Nena'),     -- 2
('Unisex'),   -- 3
('Mujer'),    -- 4
('Hombre');   -- 5

CREATE TABLE categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    categoria    VARCHAR(50)
);

INSERT INTO categoria (categoria) VALUES
('Indumentaria infantil'),  -- 1
('Indumentaria femenina'),  -- 2
('Calzado deportivo'),      -- 3
('Calzado casual');         -- 4

CREATE TABLE productos (
    id_producto   INT AUTO_INCREMENT PRIMARY KEY,
    nombre        VARCHAR(100),
    descripcion   VARCHAR(250),
    precio        DECIMAL(10,2),
    stock         INT,
    id_categoria  INT,
    id_genero     INT,
    talle         VARCHAR(10),
    imagen        VARCHAR(255),
    FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria),
    FOREIGN KEY (id_genero)    REFERENCES generos (id_genero)
);


INSERT INTO productos
(nombre, descripcion, precio, stock, id_categoria, id_genero, talle, imagen)
VALUES
('Entero nene', 'Enterito azul con estampado infantil', 15000, 10, 1, 1, 'S', 'fotos/infantil/enteronene.png'),
('Entero nena', 'Enterito rosa con estampado de gatito', 15000, 8, 1, 2, 'S', 'fotos/infantil/enteronena.png'),
('Conjunto remera + short', 'Remera celeste con short azul', 27500, 5, 1, 1, 'M', 'fotos/infantil/conjuntouno.png'),
('Remera blanca', 'Remera básica blanca unisex', 11000, 12, 1, 3, 'M', 'fotos/infantil/remerablanca.png'),
('Campera invierno militar', 'Campera impermeable con camuflado', 45000, 4, 1, 1, 'L', 'fotos/infantil/camperainviernouno.png'),
('Campera marron', 'Campera marron de nene', 13500, 7, 1, 1, 'L', 'fotos/infantil/camperauno.png'),
('Campera spiderman', 'Campera con diseño de spiderman', 14000, 10, 1, 1, 'M', 'fotos/infantil/camperaspider.png'),
('Campera gris', 'Campera color gris', 13500, 16, 1, 3, 'M', 'fotos/infantil/camperados.png'),
('Remera enteriza', 'Remera enteriza de varon', 10500, 4, 1, 1, 'S', 'fotos/infantil/remeraenterisa.png'),
('Remera enteriza azul', 'Remera enteriza azul de varon', 10500, 2, 1, 1, 'M', 'fotos/infantil/enterizados.png'),
('Remera enteriza rosa', 'Remera enteriza rosa de nena', 10500, 1, 1, 2, 'S', 'fotos/infantil/enterizatres.png'),
('Conjunto nene', 'Conjunto de remera y short de varon', 24500, 13, 1, 1, 'M', 'fotos/infantil/conjuntonene.png'),
('Conjunto de nena', 'Conjunto de vestido y buzo enterizo de nena', 25500, 5, 1, 2, 'M', 'fotos/infantil/conjuntonena.png');



INSERT INTO productos 
(nombre, descripcion, precio, stock, id_categoria, id_genero, talle, imagen)
VALUES
('Campera Larga Otoño', 'Campera larga ideal para otoño/invierno.', 69500.00, 10, 2, 4, 'M', 'fotos/ropa de mujer/campera larga otoño.webp'),
('Campera Nova con Capucha', 'Campera con capucha, estilo moderno.', 67000.00, 15, 2, 4, 'S', 'fotos/ropa de mujer/campera nova con capucha.webp'),
('Campera Parka Juno', 'Parka resistente con diseño Juno.', 42000.00, 20, 2, 4, 'L', 'fotos/ropa de mujer/campera parka juno.webp'),
('Remera Holgada Rosa', 'Remera holgada color rosa, cómoda y casual.', 36000.00, 25,2, 4, 'M', 'fotos/ropa de mujer/remera holgada rosa.webp'),
('Remera Manga Corta Overside', 'Remera overside de manga corta, varios colores.', 35000.00, 30,2, 4, 'S', 'fotos/ropa de mujer/remera manga corta overside.webp'),
('Remera Negra Topper', 'Remera deportiva negra marca Topper.', 21000.00, 18,2, 4, 'L', 'fotos/ropa de mujer/remera negra topper.webp'),
('Pantalon Babucha Mujer Modal con Bolsillo', 'Pantalón babucha de modal con bolsillos, cómodo.', 72000.00, 12, 2, 4, 'M', 'fotos/ropa de mujer/pantalon babucha mujer modal con bolsillo.webp'),
('Pantalon Dama Elastico', 'Pantalón de dama con tela elástica', 101500.00, 8, 2, 4, 'S', 'fotos/ropa de mujer/pantalon dama elastico.webp'),
('Pantalon Engomado con Bolsillos', 'Pantalón engomado con acabado brillante y bolsillos.', 201500.00, 5, 2, 4, 'M', 'fotos/ropa de mujer/pantalon engomado con bolsillos.webp'),
('Pantalon Jean Cargo Recto', 'Jean cargo de corte recto, estilo urbano.', 161500.00, 15, 2, 4, 'L', 'fotos/ropa de mujer/pantalon jean cargo recto.webp'),
('Pantalon Jean Mom Polo', 'Jean estilo Mom, marca Polo, tiro alto.', 111500.00, 20, 2, 4, 'M', 'fotos/ropa de mujer/pantalon jean mom polo.webp'),
('Pantalon Jean Skinny Tiro Alto', 'Jean skinny tiro alto, ajuste perfecto.', 101500.00, 22, 2, 4, 'S', 'fotos/ropa de mujer/pantalon jean skinny tiro alto.webp'),
('Short Pollera Deportiva', 'Short con diseño de pollera, ideal para deportes.', 41500.00, 14, 2, 4, 'M', 'fotos/ropa de mujer/short pollera deportiva.webp'),
('Short Bermuda de Jean', 'Bermuda de jean, tiro medio.', 21500.00, 16,2, 4, 'L', 'fotos/ropa de mujer/short bermuda de jean.webp'),
('Short Calza Mujer Running', 'Short calza para mujer, ideal para running.', 31500.00, 19,2, 4, 'M', 'fotos/ropa de mujer/short calza mujer running.webp'),
('Short Ciclista Tiro Alto', 'Short ciclista tiro alto, tela elástica.', 54500.00, 11,2, 4, 'S', 'fotos/ropa de mujer/short ciclista tiro alto.webp'),
('Pack x 3 Corpiños con Bretel', 'Pack de 3 corpiños con breteles ajustables.', 41500.00, 30, 2, 4, 'M', 'fotos/ropa de mujer/pack x 3 corpiños con bretel.webp'),
('Pack x 3 Corpiños', 'Pack de 3 corpiños básicos sin breteles.', 41500.00, 28, 2, 4, 'L', 'fotos/ropa de mujer/pack x 3 corpiños.webp'),
('Pack x 3 Bombachas Tiro Corto', 'Pack de 3 bombachas tiro corto, varios colores.', 31500.00, 40, 2, 4, 'S', 'fotos/ropa de mujer/packx3 bombachas tiro corto.webp'),
('Pack x 4 de Bombachas Tiro alto', 'Pack de 4 bombachas tiro alto, cómodas.', 39500.00, 35, 2, 4, 'M', 'fotos/ropa de mujer/packx4 de bombachas tiro alto.webp');

INSERT INTO productos 
(nombre, descripcion, precio, stock, id_categoria, id_genero, talle, imagen)
VALUES
('Zapatilla deportiva celeste', 'Zapatillas deportivas celeste p/running.', 30000, 20, 3, 3, '36-42', 'fotos/caldeport/zapasceleste.png'),
('Zapatilla deportiva verde/naranja', 'Zapatillas deportivas verde/naranja p/voley.', 29000, 17, 3, 3, '36-42', 'fotos/caldeport/zapasverdeynaranja.png'),
('Zapatilla deportiva naranja', 'Zapatillas deportivas naranja p/futbol.', 25000, 25, 3, 3, '36-42', 'fotos/caldeport/zapasnaranja.png'),
('Zapatilla deportiva rojas', 'Zapatillas deportivas rojas p/basquet.', 30000, 12, 3, 3, '36-42', 'fotos/caldeport/zapasrojas.png'),
('Zapatilla deportiva verde', 'Zapatillas deportivas verde p/tenis.', 35250, 9, 3, 3, '36-42', 'fotos/caldeport/zapasverde.png'),
('Zapatilla deportiva azul', 'Zapatillas deportivas azul p/rugby.', 35250, 22, 3, 3, '36-42', 'fotos/caldeport/zapasazul.png');

INSERT INTO productos 
(nombre, descripcion, precio, stock, id_categoria, id_genero, talle, imagen)
VALUES
('Zapatillas blancas Adidas', 'Zapatillas casuales blancas adidas.', 20000, 20, 4, 3, '36-42', 'fotos/calcasual/Adidasblanc.jpg'),
('Zapatillas blancas y rojas Adidas', 'Zapatillas casuales blancas y rojas adidas.', 23000, 17, 4, 3, '36-42', 'fotos/calcasual/Adidaslinroj.jpg'),
('Zapatillas marron Adidas', 'Zapatillas casuales marron adidas.', 25500, 25, 4, 3, '36-42', 'fotos/calcasual/Adidasmarron.jpg'),
('Zapatillas negras Adidas', 'Zapatillas casuales negras adidas.', 22000, 12, 4, 3, '36-42', 'fotos/calcasual/Adidasnegr.jpg'),
('Zapatillas Blancas NB', 'Zapatillas casuales blancas NB.', 21300, 9, 4, 3, '36-42', 'fotos/calcasual/Nblanc.jpg'),
('Zapatillas negras nike', 'Zapatillas casuales negras nike.', 24500, 22, 4, 3, '36-42', 'fotos/calcasual/Nikenegr.png');


ALTER TABLE productos ADD estado TINYINT(1) NOT NULL DEFAULT 1;

CREATE TABLE usuarios (
    id_usuario  INT AUTO_INCREMENT PRIMARY KEY,
    nombre      VARCHAR(50) NOT NULL,
    apellido    VARCHAR(50) NOT NULL,
    email       VARCHAR(100) NOT NULL UNIQUE,
    contrasena  VARCHAR(255) NOT NULL,
    telefono    VARCHAR(20),
    rol         ENUM('cliente', 'admin') DEFAULT 'cliente',
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nombre, apellido, email, contrasena, telefono, rol)
VALUES ('Admin', 'Principal', 'admin@zonaoutfit.com', 'admin123', '2216123456', 'admin');

INSERT INTO usuarios (nombre, apellido, email, contrasena, telefono, rol)
VALUES ('Juan', 'Perez', 'juan@email.com', 'cliente123', '2216123457', 'cliente');
=======
ALTER TABLE productos ADD estados TINYINT(1) NOT NULL DEFAULT 1;


SELECT *
FROM productos;