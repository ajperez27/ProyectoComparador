<?php
require '../../require/comun.php';
$sesion->administrador("../index.php ");
$bd = new BaseDatos();

$modeloCategoria = new ModeloCategoria($bd);
$categorias = $modeloCategoria->getList(0, $modeloCategoria->count());
rsort($categorias);

$bd->closeConexion();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>    

        <h1>Formulario de Alta de Categorias</h1><br/>
        <form action="phpInsertarCategoria.php" method="POST" enctype="multipart/form-data">
            <label>Nombre</label>
            <input type="text" name="nombre" value="" size="30" id="nombre" required/>   
            <br/>        
            <br/>
            <input type="submit" value="Añadir Categoria" />

        </form>   
    </body>
</html>
