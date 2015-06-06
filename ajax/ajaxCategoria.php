<?php

require '../require/comun.php';
header('Content-Type: application/json');
//$sesion->administrador("../index.php");
$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$categoria = Leer::get("categoria");

$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}

if ($categoria === "Todos") {
    //echo '"productos":' . $modelo->getListJSON();
    $enlaces = Paginacion::getEnlacesPaginacionJSON($pagina, $modelo->count(), Configuracion::RPP);
    echo '{"r": 1,"paginas":' . json_encode($enlaces) . ',"productos":' . $modelo->getListJSON($pagina, Configuracion::RPP) . '}';
} else {
    //echo '"productos":' . $modelo->getListJSON(0, 10, "tipo='$categoria'");
    $enlaces = Paginacion::getEnlacesPaginacionJSON($pagina, $modelo->count("tipo='$categoria'"), Configuracion::RPP);
    echo '{"r": 1,"paginas":' . json_encode($enlaces) . ',"productos":' . $modelo->getListJSON($pagina, Configuracion::RPP, "tipo='$categoria'") . '}';
}

$bd->closeConexion();

