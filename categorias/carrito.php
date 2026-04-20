<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_cliente.css" />
    <link rel="icon" type="png" href="../imagenes\logo_chico.png">
    <title>Cliente | Carrito</title>
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
                <li> <a href="pedidos.php"> Pedidos</a></li>
                <li> <a href="#"> Carrito🛒</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <h1>Tu Carrito 🛒</h1>
    <br>
    <div class="contenedor-categorias">
        <?php
        session_start();
        include("../php/funciones.php");

        $productos = obtenerProductos();
        $carrito = $_SESSION['carrito'] ?? [];

        $total = 0;
        ?>

        <div class="contenedor-categorias">

        <?php if (empty($carrito)): ?>

            <p>Tu carrito está vacio 🛒</p>

        <?php else: ?>

            <?php foreach ($carrito as $item): ?>
                <?php foreach ($productos as $p): ?>
                    <?php if ($p['id'] == $item['id']): ?>

                        <?php
                        $subtotal = $p['precio'] * $item['cantidad'];
                        $total += $subtotal;
                        ?>

        <div class="producto">
                            <img src="../imagenes/<?php echo $p['imagen']; ?>" width="100">

                            <h3><?php echo $p['nombre']; ?></h3>
                            <p>Precio: $<?php echo $p['precio']; ?></p>
                            <p>Cantidad: <?php echo $item['cantidad']; ?></p>
                            <p>Subtotal: $<?php echo $subtotal; ?></p>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>

            <h2>Total: $<?php echo $total; ?></h2>

            <form method="POST" action="../php/pagar.php">
                <button type="submit" class="global-btn">Pagar</button>
            </form>

        <?php endif; ?>

        </div>

    </div>
    <footer>© 2026 LocalComer - Todos los derechos reservados <br> Desarrollado por InnovaCode <br> Política de privacidad | Términos y condiciones | Contacto</footer>
</body>
</html>