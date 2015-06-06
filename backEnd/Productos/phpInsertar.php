<?php

require '../../require/comun.php';
$nombre = Leer::post("nombre");
$tipo = Leer::post("tipo");
$precioAlcampo = Leer::post("precioAlcampo");
$precioCarrefour = Leer::post("precioCarrefour");
$precioCoviran = Leer::post("precioCoviran");
$precioDia = Leer::post("precioDia");

$subir = new SubirArchivos("archivo");
$subir->subir();

$foto = $subir->getExtensiones();

$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$objeto = new Producto(null, $nombre, $tipo, $precioAlcampo, $precioCarrefour, $precioCoviran, $precioDia, $foto[0]);
$r = $modelo->add($objeto);


$bd->closeConexion();

header("Location: ../index.php");
?>