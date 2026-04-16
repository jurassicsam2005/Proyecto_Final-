<?php
session_start();

$ids = $_POST['id'];
$cantidades = $_POST['cantidad'];

$carrito = [];

for ($i = 0; $i < count($ids); $i++) {
    if ($cantidades[$i] > 0) {
        $carrito[] = [
            "id" => $ids[$i],
            "cantidad" => $cantidades[$i]
        ];
    }
}

$_SESSION['carrito'] = $carrito;

header("Location: ../categorias/carrito.php");
exit();
?>