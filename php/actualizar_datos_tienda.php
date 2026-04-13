<?php
include("funciones.php");

$ubicacion = $_POST['ubicacion'];
$lunes = $_POST['lunes'];
$martes = $_POST['martes'];
$miercoles = $_POST['miercoles'];
$jueves = $_POST['jueves'];
$viernes = $_POST['viernes'];
$sabado = $_POST['sabado'];
$domingo = $_POST['domingo'];

actualizarTiendaJSON($ubicacion, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo);

header("Location: ../vendedor_tienda.php");
?>