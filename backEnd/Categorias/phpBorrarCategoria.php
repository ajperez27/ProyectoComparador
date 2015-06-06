<?php
require '../../require/comun.php';
$sesion->administrador("../index.php ");

$nombre = Leer::get("nombre");
$bd = new BaseDatos();
$modelo = new ModeloCategoria($bd);

$r = $modelo->deletePorNombre($nombre);

$bd->closeConexion();

header("Location: ../index.php?op=delete&r=$r");
