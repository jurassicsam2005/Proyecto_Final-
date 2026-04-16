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

function obtenerProductos() {
    $ruta = __DIR__ . "/../vendedor/productos.json";

    if (!file_exists($ruta)) return [];

    $json = file_get_contents($ruta);
    $datos = json_decode($json, true);

    return is_array($datos) ? $datos : [];
}

function guardarProductos($productos) {
    $ruta = __DIR__ . "/../vendedor/productos.json";
    $json = json_encode($productos, JSON_PRETTY_PRINT);
    file_put_contents($ruta, $json, LOCK_EX);
}

function agregarProducto($nombre, $precio, $stock, $imagen) {
    $productos = obtenerProductos();

    $id = count($productos) > 0 ? max(array_column($productos, 'id')) + 1 : 1;

    $productos[] = [
        "id" => $id,
        "nombre" => $nombre,
        "precio" => $precio,
        "stock" => $stock,
        "imagen" => $imagen
    ];

    guardarProductos($productos);
}

function eliminarProducto($id) {
    $productos = obtenerProductos();

    $productos = array_filter($productos, function($p) use ($id) {
        return $p['id'] != $id;
    });

    guardarProductos(array_values($productos));
}

function editarProducto($id, $nombre, $precio, $stock, $nombreImagen) {
    $productos = obtenerProductos();

    foreach ($productos as &$p) {
    if ($p['id'] == $id) {

        if (!empty($nombre)) $p['nombre'] = $nombre;
        if ($precio !== "") $p['precio'] = $precio;
        if ($stock !== "") $p['stock'] = $stock;
        if (!empty($nombreImagen)) {$p['imagen'] = $nombreImagen;}
    }
}

    guardarProductos($productos);
}

function procesarCompra($carrito) {

    $productos = obtenerProductos();

    foreach ($carrito as $item) {
        foreach ($productos as &$p) {
            if ($p['id'] == $item['id']) {

                //se resta el stock
                $p['stock'] -= $item['cantidad'];

                //evitar negativos
                if ($p['stock'] < 0) {
                    $p['stock'] = 0;
                }
            }
        }
    }

    guardarProductos($productos);
}

?>