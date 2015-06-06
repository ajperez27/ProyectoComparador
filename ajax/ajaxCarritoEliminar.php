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
}
unset($cesta[$idProducto]);

$_SESSION["__cesta"] = $cesta;

if (sizeof($cesta) == 0) {
    echo '{"r": 0}';
} else {
    echo '{"r": 0, "cantidad" : '.$cantidad.'}';
    header("Location: ajaxVerCarrito.php?pagina=" . $pagina);
}


