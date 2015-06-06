<?php

require '../../require/comun.php';
$sesion->administrador("../index.php ");
$nombre = Leer::post("nombre");

$bd = new BaseDatos();
$modelo = new ModeloCategoria($bd);
$objeto = new Categoria($nombre);
$r = $modelo->add($objeto);


$bd->closeConexion();

header("Location: ../index.php?r=".$r);
?>