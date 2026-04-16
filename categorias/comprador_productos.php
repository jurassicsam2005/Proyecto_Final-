<?php
include("../php/funciones.php");
$productos = obtenerProductos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_cliente.css" />
    <link rel="icon" type="png" href="../imagenes/logo_chico.png">
    <title>Cliente | Productos</title>
</head>
<body>
    <header>
        <nav class="navbar">        
            <div class="logo">
                <img src="../imagenes\logo_chico.png" alt="banner cliente" width="100"  >
            </div>
            <ul class="nav-links">
                <li> <a href="../index.html"> Volver al inicio</a></li>
                <li> <a href="../cliente_tiendas.html"> Tiendas</a></li>
                <li> <a href="#"> Pedidos</a></li>
                <li> <a href="carrito.php"> Carrito🛒</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <h1>Productos</h1>
    <br>
    <div >

        <form method="POST" action="../php/carrito.php" class="contenedor-categorias-2">

        <?php foreach ($productos as $p): ?>

        <div class="producto">

            <h3><?php echo $p['nombre']; ?></h3>
            <img src="../imagenes/<?php echo $p['imagen']; ?>" width="120">
            <p>Precio: $<?php echo $p['precio']; ?></p>
            <p>Stock: <?php echo $p['stock']; ?></p>

            <input type="hidden" name="id[]" value="<?php echo $p['id']; ?>">

            <label>Cantidad:</label>
            <input type="number" name="cantidad[]" min="0" max="<?php echo $p['stock']; ?>">

        </div>

        <?php endforeach; ?>

        <button type="submit" class="global-btn">Agregar al carrito</button>

        </form>

    </div>
    <footer>© 2026 LocalComer - Todos los derechos reservados <br> Desarrollado por InnovaCode <br> Política de privacidad | Términos y condiciones | Contacto</footer>
</body>
</html>