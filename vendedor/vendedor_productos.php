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
    <title>Vendedor | Mis productos</title>
</head>
<body>
    <header>
        <nav class="navbar">        
            <div class="logo">
                <img src="../imagenes\logo_chico.png" alt="banner vendedor" width="100"  >
            </div>
            <ul class="nav-links">
                <li> <a href="../index.html"> Volver al inicio</a></li>
                <li> <a href="../vendedor_tienda.php"> Mi negocio</a></li>
                <li> <a href="#"> Mis productos</a></li>
                <li><a href="vendedor_pedidos.php"> Pedidos</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <h1>Mis Productos</h1>
    <br>
    <div class="mi-tienda">
        
        <table class="tabla_productos">

            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>

            <?php
            $productos = obtenerProductos();
            foreach ($productos as $p):
            ?>

            <tr>
                <td>
                    <?php if (!empty($p['imagen'])): ?>
                        <img src="../imagenes/<?php echo $p['imagen']; ?>" width="80">
                    <?php else: ?>
                        Sin imagen
                    <?php endif; ?>
                </td>
                <td><?php echo $p['nombre']; ?></td>
                <td><?php echo number_format($p['precio'], 2); ?></td>
                <td><?php echo $p['stock']; ?></td>

                <td>
                    <!-- eliminar -->
                    <form method="POST" action="../php/acciones_productos.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                        <button name="accion" value="eliminar" class="global-btn">Eliminar</button>
                    </form>

                    <!-- editar -->
                    <form method="POST" action="../php/acciones_productos.php" style="display:inline;" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                        <input type="text" name="nombre" placeholder="Nombre">
                        <input type="number" name="precio" placeholder="Precio">
                        <input type="number" name="stock" placeholder="Stock">
                        <input type="file" name="imagen">
                        <button name="accion" value="editar" class="global-btn">Editar</button>
                    </form>
                </td>
            </tr>

            <?php endforeach; ?>

        </table>

        <form method="POST" action="../php/acciones_productos.php" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="number" name="precio" placeholder="Precio" step="0.01" min="0">
        <input type="number" name="stock" placeholder="Stock">
        <input type="file" name="imagen">

        <button type="submit" name="accion" value="agregar" class="global-btn">Agregar</button>
        </form>

    </div>
    
    <br>
    <footer>© 2026 LocalComer - Todos los derechos reservados <br> Desarrollado por InnovaCode <br> <a href="../politicas.html"> Política de privacidad</a> | <a href="../terminos.html"> Términos y condiciones</a> | <a href="../contacto.html"> Contacto</a></footer>
</body>
</html>