<?php
include("../php/funciones.php");
$productos = obtenerProductos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_vendedor.css" />
    <link rel="icon" type="png" href="../imagenes/logo_chico.png">
    <title>Vendedor | Mis Pedidos</title>
</head>
<body>
    <header>
        <nav class="navbar">        
            <div class="logo">
                <img src="../imagenes\logo_chico.png" alt="banner vendedor" width="100"  >
            </div>
            <ul class="nav-links">
                <li> <a href="../index.html"> Volver al inicio</a></li>
                <li> <a href="../vendedor_tienda.php"> Mi Negocio</a></li>
                <li> <a href="vendedor_productos.php"> Mis Productos</a></li>
                <li><a href="vendedor_pedidos.php"> Pedidos</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <h1>Mis Pedidos</h1>
    <br>

    <div class="contenedor-pedidos">
        
    <?php
        $pedidos = json_decode(file_get_contents("../pedidos/pedidos.json"), true);
        ?>
        <div class="columna">
        <h2>Pedidos vigentes</h2>

        <?php foreach ($pedidos as $pedido): ?>
            <?php if ($pedido['estado'] == "vigente"): ?>

                <div>
                    <h2>Pedido #<?php echo $pedido['id']; ?></h2>

                    <?php foreach ($pedido['productos'] as $prod): ?>
                        <img src="../imagenes/<?php echo $prod['imagen']; ?>" width="80">
                        <p><?php echo $prod['nombre']; ?> x <?php echo $prod['cantidad']; ?></p>
                    <?php endforeach; ?>

                    <p>Total: $<?php echo $pedido['total']; ?></p>

                    <form method="POST" action="../php/actualizar_pedido.php">
                    <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">
                    <button name="accion" value="entregado" class="global-btn">Marcar como entregado</button>
                    </form>
                    <hr>
                </div>

            <?php endif; ?>
        <?php endforeach; ?>
        </div>

        <div class="columna">
        <h2>Pedidos anteriores</h2>

        <?php foreach ($pedidos as $pedido): ?>
            <?php if ($pedido['estado'] == "entregado"): ?>

                <div>
                    <h2>Pedido #<?php echo $pedido['id']; ?></h2>
                    <?php foreach ($pedido['productos'] as $prod): ?>
                        <img src="../imagenes/<?php echo $prod['imagen']; ?>" width="80">
                        <p><?php echo $prod['nombre']; ?> x <?php echo $prod['cantidad']; ?></p>
                    <?php endforeach; ?>
                    <p>Total: $<?php echo $pedido['total']; ?></p>
                    <hr>
                </div>

            <?php endif; ?>
        <?php endforeach; ?>
        </div>

    </div>
    
    <br>
    <footer>© 2026 LocalComer - Todos los derechos reservados <br> Desarrollado por InnovaCode <br> Política de privacidad | Términos y condiciones | Contacto</footer>
</body>
</html>