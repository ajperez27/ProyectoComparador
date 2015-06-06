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
    $_SESSION["__cesta"] = array();
    $cesta = $_SESSION["__cesta"];
}

$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$producto = $modelo->get($idProducto);
//$destino = Leer::get("destino");

if (isset($cesta[$idProducto])) {
    $detalleCarrito = $cesta[$idProducto];
    $detalleCarrito->setCantidad($detalleCarrito->getCantidad() + 1);
} else {
    $detalleCarrito = new DetalleCarrito(null, null, $idProducto, 1, null, null, null, null,$producto->getTipo() );
    $cesta[$idProducto] = $detalleCarrito;
}
$_SESSION["__cesta"] = $cesta;
$bd->closeConexion();

header("Location: ajaxVerCarrito.php?pagina=".$pagina);
//echo '{"r": 1}';

/*if ($destino == "carro") {
    $bd->closeConexion();
    header("Location: ../carro.php#aqui");
} elseif ($destino == "comprar") {
    $bd->closeConexion();
    header("Location: realizarcompra.php");
} else {
    $bd->closeConexion();
    header("Location: ../index.php");
}*/