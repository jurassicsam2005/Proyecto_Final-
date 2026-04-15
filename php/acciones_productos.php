<?php
include("funciones.php");

$nombreImagen = "";

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {

    $nombreImagen = time() . "_" . $_FILES['imagen']['name'];

    move_uploaded_file(
        $_FILES['imagen']['tmp_name'],
        "../imagenes/" . $nombreImagen
    );
}

$accion = $_POST['accion'];

if ($accion == "agregar") {
    agregarProducto($_POST['nombre'], $_POST['precio'], $_POST['stock'], $nombreImagen);
}

if ($accion == "eliminar") {
    eliminarProducto($_POST['id']);
}

if ($accion == "editar") {
    editarProducto($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['stock']);
}

header("Location: ../vendedor/vendedor_productos.php");
exit();
?>