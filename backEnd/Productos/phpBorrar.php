<?php
require '../../require/comun.php';
$bd = new BaseDatos();

$idProducto = Leer::get("id");
$modelo = new ModeloProducto($bd);

unlink($modelo->get($idProducto)->getFoto());

$r = $modelo->deletePorId($idProducto);

$bd->closeConexion();

header("Location: ../index.php?op=delete&r=$r");
