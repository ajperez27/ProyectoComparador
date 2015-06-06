<?php

header('Content-Type: application/json');

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');
$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}
$idProducto = Leer::get("idProducto");

session_start();
if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
} else {
    header("Location: ajaxVerCarrito.php?pagina=" . $pagina);
    exit();
}
$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$producto = $modelo->get($idProducto);

if (isset($cesta[$idProducto])) {
    $detalleCarrito = $cesta[$idProducto];
    $detalleCarrito->setCantidad($detalleCarrito->getCantidad() - 1);
    if ($detalleCarrito->getCantidad() < 1) {
        unset($cesta[$idProducto]);
    }
    $_SESSION["__cesta"] = $cesta;
}
$bd->closeConexion();
header("Location: ajaxVerCarrito.php?pagina=" . $pagina);

