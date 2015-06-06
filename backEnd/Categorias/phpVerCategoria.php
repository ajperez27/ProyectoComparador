<?php
require '../../require/comun.php';
$sesion->administrador("../index.php ");
$nombre = Leer::request("nombre");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Formulario de Modificar Categorias</h1><br/>
        <form action="phpModificarCategorias.php" method="POST" enctype="multipart/form-data">
            <input type = "hidden" name = "nombrepk" value = "<?php echo $nombre ?>"/>
            <label>Nombre</label>
            <br/>
            <input type="text" name="nombreNuevo" value="<?php echo $nombre; ?>" size="30" id="nombre" required/>
            <br/>
            <input type="submit" value="Modificar" />
        </form>   
    </body>
</html>
