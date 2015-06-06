<?php

require '../../require/comun.php';
$sesion->administrador("../index.php ");
$nombrepk = Leer::post("nombrepk");
$nombreNuevo = Leer::post("nombreNuevo");

$bd = new BaseDatos();
$modelo = new ModeloCategoria($bd);

$objeto = new Categoria($nombreNuevo);

$r = $modelo->edit($objeto, $nombrepk);


$modeloProducto = new ModeloProducto($bd);

$productos = $modeloProducto->getList();
foreach ($productos as $key => $producto) {
    if($producto->getTipo()==$nombrepk)
    {        
        $producto->setTipo($nombreNuevo);
        $modeloProducto->edit($producto);
    }    
}

$bd->closeConexion();
header("Location: ../index.php?op=update&r=$r");
?>    

