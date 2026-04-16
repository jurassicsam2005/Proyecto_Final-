<?php
session_start();
include("../php/funciones.php");

$carrito = $_SESSION['carrito'] ?? [];

//para validar stock
$productos = obtenerProductos();

foreach ($carrito as &$item) {
    foreach ($productos as $p) {
        if ($p['id'] == $item['id']) {

            if ($item['cantidad'] > $p['stock']) {
                $item['cantidad'] = $p['stock'];
            }
        }
    }
}

//procesar la compra
procesarCompra($carrito);

//limpiar el carrito
unset($_SESSION['carrito']);

header("Location: ../categorias/carrito.php?compra=ok");
exit();
?>