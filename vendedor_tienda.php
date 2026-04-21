<?php
include("php/funciones.php");
$tienda = obtenerTienda();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos_vendedor.css" />
    <link rel="icon" type="png" href="imagenes\logo_chico.png">
    <title>Vendedor | Mi tienda</title>
</head>
<body>
    <header>
        <nav class="navbar">        
            <div class="logo">
                <img src="imagenes\logo_chico.png" alt="banner vendedor" width="100"  >
            </div>
            <ul class="nav-links">
                <li> <a href="index.html"> Volver al inicio</a></li>
                <li> <a href="#"> Mi negocio</a></li>
                <li> <a href="vendedor/vendedor_productos.php"> Mis productos</a></li>
                <li><a href="vendedor/vendedor_pedidos.php"> Pedidos</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <h1>Mi tienda</h1>
    <br>
    <div class="mi-tienda">
        <div class="contenedor-imagen-tienda">
            <img src="imagenes/estudiante.jpg" alt="Foto de la tienda">
        </div>

        <div class="contenedor-info">
            <h2 id="nombre-tienda">Papelería "El Estudiante"</h2>
            <p><strong>Ubicación:</strong><span id="ubicacion-tienda"><?php echo $tienda['ubicacion']; ?></span></p>
            <table class="tabla-horarios">
                <thead>
                <tr>
                    <th>Día</th>
                    <th>Horario</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Lunes</td>
                    <td id="hora-lunes"><?php echo $tienda['lunes']; ?></td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td id="hora-martes"><?php echo $tienda['martes']; ?></td>
                </tr>
                <tr>
                    <td>Miércoles</td>
                    <td id="hora-miercoles"><?php echo $tienda['miercoles']; ?></td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td id="hora-jueves"><?php echo $tienda['jueves']; ?></td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td id="hora-viernes"><?php echo $tienda['viernes']; ?></td>
                </tr>
                <tr>
                    <td>Sábado</td>
                    <td id="hora-sabado"><?php echo $tienda['sabado']; ?></td>
                </tr>
                <tr>
                    <td>Domingo</td>
                    <td id="hora-domingo"><?php echo $tienda['domingo']; ?></td>
                </tr>
                </tbody>
            </table>
            <br>
            <h3>Edición de información</h3>
            <br>

            <form method="POST" action="/Proyecto_Final-/php/actualizar_datos_tienda.php">
                <input type="text" name="ubicacion" placeholder="Nueva ubicación">

                <input type="text" name="lunes" placeholder="Lunes">
                <input type="text" name="martes" placeholder="Martes">
                <input type="text" name="miercoles" placeholder="Miércoles">
                <input type="text" name="jueves" placeholder="Jueves">
                <input type="text" name="viernes" placeholder="Viernes">
                <input type="text" name="sabado" placeholder="Sábado">
                <input type="text" name="domingo" placeholder="Domingo">

                <button type="submit" class="edit-btn">Editar información</button>
            </form>

        </div>
    </div>
    
    <br>
    <footer>© 2026 LocalComer - Todos los derechos reservados <br> Desarrollado por InnovaCode <br> <a href="politicas.html"> Política de privacidad</a> | <a href="terminos.html"> Términos y condiciones</a> | <a href="contacto.html"> Contacto</a></footer>
</body>
</html>