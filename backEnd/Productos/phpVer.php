<?php
require '../../require/comun.php';

$bd = new BaseDatos();
$idProducto = Leer::request("id");
$modelo = new ModeloProducto($bd);
$producto = $modelo->get($idProducto);

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
        <h1>Formulario de Modificar Productos</h1><br/>
        <form action="phpModificar.php" method="POST" enctype="multipart/form-data">
            <input type = "hidden" name = "idProducto" value = "<?php echo $idProducto ?>"/>
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $producto->getNombre(); ?>" size="30" id="nombre" required/>
            <br/>
            <br/>
            <label>Tipo</label>
            <select name="tipo">
            <?php
            foreach ($categorias as $key => $categoria) {
                ?>
                <option <?php if ($producto->getTipo() == $categoria->getNombre()) { echo 'selected';}?> ><?php echo $categoria->getNombre();?></option>
                <?php
            }
            ?>
            </select>
     
            <br/>
            <br/>
            <label>Precio Alcampo</label>
            <input type="number" name="precioAlcampo" value="<?php echo $producto->getPrecioAlcampo(); ?>" size="10" id="precioAlcampo" required/>
            <br/>
            <br/>
            <label>Precio Carrefour</label>
            <input type="number" name="precioCarrefour" value="<?php echo $producto->getPrecioCarrefour(); ?>" size="10" id="precioCarrefour" required/>
            <br/>
            <br/>
            <label>Precio Coviran</label>
            <input type="number" name="precioCoviran" value="<?php echo $producto->getPrecioCoviran(); ?>" size="10" id="precioCoviran" required/>
            <br/>
            <br/>
            <label>Precio Dia</label>
            <input type="number" name="precioDia" value="<?php echo $producto->getPrecioDia(); ?>" size="10" id="precioDia" required/>
            <br/>  
            <br/>
            <label>Foto del producto</label>
            <input type="file" name="archivo[]"/>
            <br/>
            <br/>
            <input type="submit" value="Modificar" />
        </form>   
    </body>
</html>
