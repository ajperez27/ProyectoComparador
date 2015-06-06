<?php
require '../../require/comun.php';

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
        <h1>Formulario de Alta de Productos</h1><br/>
        <form action="phpInsertar.php" method="POST" enctype="multipart/form-data">
            <label>Nombre</label>
            <input type="text" name="nombre" value="" size="30" id="nombre" required/>
            <br/>
            <br/>
            <label>Categoria</label>  
            <select name="tipo">
                <?php
                foreach ($categorias as $key => $categoria) {
                    ?>
                    <option ><?php echo $categoria->getNombre(); ?></option>
                    <?php
                }
                ?>
            </select>

            <br/>
            <br/>
            <label>Precio Alcampo</label>
            <input type="number" name="precioAlcampo" value="" size="10" id="precioAlcampo" required/>
            <br/>
            <br/>
            <label>Precio Carrefour</label>
            <input type="number" name="precioCarrefour" value="" size="10" id="precioCarrefour" required/>
            <br/>
            <br/>
            <label>Precio Coviran</label>
            <input type="number" name="precioCoviran" value="" size="10" id="precioCoviran" required/>
            <br/>
            <br/>
            <label>Precio Dia</label>
            <input type="number" name="precioDia" value="" size="10" id="precioDia" required/>
            <br/>  
            <br/>
            <label>Foto del producto</label>
            <input type="file" name="archivo[]" required/>
            <br/>
            <br/>
            <input type="submit" value="Añadir Producto" />
        </form>   
    </body>
</html>
