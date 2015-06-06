<?php

require '../../require/comun.php';
$sesion->administrador("../index.php ");

$idProducto = Leer::post("idProducto");
$nombre = Leer::post("nombre");
$tipo = Leer::post("tipo");
$precioAlcampo = Leer::post("precioAlcampo");
$precioCarrefour = Leer::post("precioCarrefour");
$precioCoviran = Leer::post("precioCoviran");
$precioDia = Leer::post("precioDia");

$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);

$subir = new SubirArchivos("archivo");
$subir->subir();
$foto = $subir->getExtensiones();

if (empty($foto)) {
    $foto[0] = $modelo->get($idProducto)->getFoto();
}
 else {
    unlink($modelo->get($idProducto)->getFoto());
}

$objeto = new Producto($idProducto, $nombre, $tipo, $precioAlcampo, $precioCarrefour, $precioCoviran, $precioDia, $foto[0]);

echo $r = $modelo->edit($objeto);
$bd->closeConexion();
header("Location: ../index.php?op=update&r=$r");
?>    

