<?php

function obtenerTienda() {
    //se añadio la ruta como una variable para que no de errores entre tantos archivos
    $ruta = __DIR__ . "/../tienda.json";

    if (!file_exists($ruta)) {
        return [];
    }

    $json = file_get_contents($ruta);
    $datos = json_decode($json, true);

    if (!is_array($datos)) {
        return [];
    }

    return $datos;
}

function actualizarTiendaJSON($ubicacion, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo) {

    $ruta = __DIR__ . "/../tienda.json";

    //aqui se lee el archivo json
    if (file_exists($ruta)) {
        $json = file_get_contents($ruta);
        $datos = json_decode($json, true);
        if (!is_array($datos)) {
            $datos = [];
        }
    } else {
        $datos = [];
    }

    //se limpian los espacios sobrantes
    $ubicacion = trim($ubicacion);
    $lunes = trim($lunes);
    $martes = trim($martes);
    $miercoles = trim($miercoles);
    $jueves = trim($jueves);
    $viernes = trim($viernes);
    $sabado = trim($sabado);
    $domingo = trim($domingo);

    //solo se actualizan los que no tengan valores vacios
    if (!empty($ubicacion)) $datos['ubicacion'] = $ubicacion;
    if (!empty($lunes)) $datos['lunes'] = $lunes;
    if (!empty($martes)) $datos['martes'] = $martes;
    if (!empty($miercoles)) $datos['miercoles'] = $miercoles;
    if (!empty($jueves)) $datos['jueves'] = $jueves;
    if (!empty($viernes)) $datos['viernes'] = $viernes;
    if (!empty($sabado)) $datos['sabado'] = $sabado;
    if (!empty($domingo)) $datos['domingo'] = $domingo;

    //se guardan los datos en el json
    $nuevoJson = json_encode($datos, JSON_PRETTY_PRINT);
    file_put_contents($ruta, $nuevoJson, LOCK_EX);
}



?>