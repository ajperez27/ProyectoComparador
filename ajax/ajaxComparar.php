<?php

header('Content-Type: application/json');

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');

$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$totalAlcampo = 0;
$totalCarrefour = 0;
$totalCoviran = 0;
$totalDia = 0;
$numProductos = 0;

session_start();

if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
    if (!$cesta) {
        $resp = '{"r": 0}';
    } else {

        $resp = '{"r": 1, "comparativa":[';

        foreach ($cesta as $key => $detalleCarrito) {
            $cantidad = $detalleCarrito->getCantidad();
            $producto = $modelo->get($detalleCarrito->getIdProducto());
            $totalAlcampo += $producto->getPrecioAlcampo() * $cantidad;
            $totalCarrefour += $producto->getPrecioCarrefour() * $cantidad;
            $totalCoviran += $producto->getPrecioCoviran() * $cantidad;
            $totalDia += $producto->getPrecioDia() * $cantidad;
            $numProductos += $cantidad;
        }
        $resp.= '{"nombre":"Alcampo", "total":' . $totalAlcampo . ' },'
                . '{"nombre":"Coviran", "total":' . $totalCoviran . ' },'
                . '{"nombre":"Dia", "total":' . $totalDia . ' },'
                . '{"nombre":"Carrefour", "total":' . $totalCarrefour . ' }],'
                . '"numeroProductos" :' . $numProductos . '}';
    }
} else {
    $resp = '{"r": 0}';
}

echo $resp;
$bd->closeConexion();
