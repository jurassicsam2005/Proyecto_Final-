<?php
$ruta = "../pedidos/pedidos.json";

$pedidos = json_decode(file_get_contents($ruta), true);

foreach ($pedidos as &$pedido) {
    if ($pedido['id'] == $_POST['id']) {
        $pedido['estado'] = "entregado";
    }
}

file_put_contents($ruta, json_encode($pedidos, JSON_PRETTY_PRINT));

header("Location: ../vendedor/vendedor_pedidos.php");
exit();
?>