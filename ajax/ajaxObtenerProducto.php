<?php

require '../require/comun.php';
header('Content-Type: application/json');
//$sesion->administrador("../index.php");
$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$nombre = Leer::get("nombre");

$r = $modelo->getListJSON(0, Configuracion::RPP, "nombre = '$nombre'");

echo '{"r": 1, "productos":' . $r . '}';

$bd->closeConexion();
