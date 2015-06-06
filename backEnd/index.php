<?php
require '../require/comun.php';
$sesion->administrador("../index.php ");
$usuario = $sesion->getUsuario();

$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}

$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$modeloCategoria = new ModeloCategoria($bd);

$productos = $modelo->getList($pagina);
$categorias = $modeloCategoria->getList(0, $modeloCategoria->count());

$total = $modelo->count();
$enlaces = Paginacion::getEnlacesPaginacion($pagina, $total, Configuracion::RPP);
?>

<!DOCTYPE html>
<head>
    <title>Comparador</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/estilos/estilos.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="shortcut icon" href="../Imagenes/favicon.ico" />
    <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="../js/move-top.js"></script>
    <script type="text/javascript" src="../js/easing.js"></script>
    <script type="text/javascript" src="../js/startstop-slider.js"></script>
    <script type="text/javascript" src="../js/paginacion/paginacion.js"></script>
</head>
<body>

    <div class="wrap">
        <div class="header">
            <div class="headertop_desc">
                <div class="call">
                    <p><span>¿Necesitas ayuda?</span> Llamanos <span class="number">958-000000</span></span></p>
                </div>
                <div class="account_desc">
                    <ul>
                        <li><a href="#">Hola <?php echo $usuario->getLogin(); ?></a></li>
                        <li><a href="../backEnd/phplogout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="header_top">
                <div class="logo">
                    <a href="index.php"><img src="../Imagenes/logo.png" alt="" /></a>
                </div>
                <div class="cart">
                    <p>¡Bienvenido a nuestro comparador online!             
                    </p>
                </div>                
                <div class="clear"></div>
            </div>
            <div class="header_bottom">
                <div class="menu">
                    <ul>
                        <li class="active"><a href="../index.php">Productos</a></li>
                        <li><a href="../supermercados.php">Supermercados</a></li>
                        <li><a href="../contacta.php">Contacta</a></li>
                        <li><a href="../acerca de.php">Acerca de</a></li>
                        <div class="clear"></div>
                    </ul>
                </div>

                <div class="clear"></div>
            </div>            

            <div class="main">
                <div class="content" id="divDatos">               
                    <br/>
                    <br/>
                    <h2>Productos </h2>
                    <br/>
                    <h2><a href="#modalProductos">Añadir Productos</a></h2>
                    <br/>
                    <br/>
                    <table  border="1">      
                        <tr>
                            <th>Id</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Precio Alcampo</th>                
                            <th>Precio Carrefour</th>
                            <th>Precio Covirán</th>
                            <th>Precio Dia</th>                                                        
                            <th>Modificar</th>
                            <th>Borrar</th>
                        </tr>

                        <?php
                        foreach ($productos as $key => $producto) {
                            $ruta = substr($producto->getFoto(), 3, strlen($producto->getFoto()) - 3);
                            ?>
                            <tr>
                                <td><?php echo $producto->getIdProducto(); ?></td>
                                <td> <img width="25%" src="<?php echo $ruta; ?>"/></td>
                                <td><?php echo $producto->getNombre(); ?></td>                                
                                <td><?php echo $producto->getTipo(); ?></td>
                                <td><?php echo $producto->getPrecioAlcampo(); ?>€</td>                
                                <td><?php echo $producto->getPrecioCarrefour(); ?>€</td>
                                <td><?php echo $producto->getPrecioCoviran(); ?>€</td>
                                <td><?php echo $producto->getPrecioDia(); ?>€</td>                                
                                <td  class="botonRojoPro"> <a href='#modificarProducto<?php echo $producto->getIdProducto(); ?>'>Modificar</a></td>
                                <td  class="botonRojoPro"> <a href='#borrarProducto<?php echo $producto->getIdProducto(); ?>'>Borrar</a></td>
                            </tr>

                            <div class="modal"id="borrarProducto<?php echo $producto->getIdProducto(); ?>" >
                                <div class="modal-content">
                                    <div class="header tituloForm">
                                        <h2>¿Borrar el producto?</h2>
                                    </div>
                                    <div class="copy formBorrar">                                       
                                        <img width="30%" src="<?php echo $ruta; ?>"/>
                                        <br/>
                                        <br/> 
                                        <h3><?php echo $producto->getNombre(); ?></h3> 
                                        <br/>                                 

                                    </div>
                                    <div class="cf footer">
                                        <a class="aceptar" href="Productos/phpBorrar.php?id=<?php echo $producto->getIdProducto(); ?>">Aceptar</a>
                                        <a class="cancelar" href="#">Cancelar</a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="overlay"></div>
                            </div>

                            <div class="modal"id="modificarProducto<?php echo $producto->getIdProducto(); ?>" >
                                <div class="modal-content">
                                    <div class="header tituloForm">
                                        <h2>Modificar Producto</h2>
                                    </div>
                                    <div class="copy formModificar" >
                                        <form action="Productos/phpModificar.php" method="POST" enctype="multipart/form-data">
                                            <input type = "hidden" name = "idProducto" value = "<?php echo $producto->getIdProducto(); ?>"/>
                                            <br/>
                                            <label>Nombre:</label>
                                            <input type="text" name="nombre" value="<?php echo $producto->getNombre(); ?>" maxlength="18"  size="20" id="nombre" required/>
                                            <br/>
                                            <br/>
                                            <label>Tipo:</label>
                                            <select name="tipo">
                                                <?php
                                                foreach ($categorias as $key => $categoria) {
                                                    ?>
                                                    <option <?php
                                                    if ($producto->getTipo() == $categoria->getNombre()) {
                                                        echo 'selected';
                                                    }
                                                    ?> ><?php echo $categoria->getNombre(); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                            </select>

                                            <br/>
                                            <br/>
                                            <label>Precio Alcampo:</label>
                                            <input type="number" step="any" name="precioAlcampo" value="<?php echo $producto->getPrecioAlcampo(); ?>" min="0" size="10" id="precioAlcampo" required/>
                                            <span>€</span>
                                            <br/>
                                            <br/>
                                            <label>Precio Carrefour:</label>
                                            <input type="number" step="any"  name="precioCarrefour" value="<?php echo $producto->getPrecioCarrefour(); ?>"  min="0" size="10" id="precioCarrefour" required/>
                                            <span>€</span>
                                            <br/>
                                            <br/>
                                            <label>Precio Coviran:</label>
                                            <input type="number" step="any" name="precioCoviran" value="<?php echo $producto->getPrecioCoviran(); ?>"  min="0" size="10" id="precioCoviran" required/>
                                            <span>€</span>
                                            <br/>
                                            <br/>
                                            <label>Precio Dia:</label>
                                            <input type="number" step="any" name="precioDia" value="<?php echo $producto->getPrecioDia(); ?>" min="0" size="10" id="precioDia" required/>
                                            <span>€</span>
                                            <br/>  
                                            <br/>
                                            <label>Foto del producto:</label>
                                            <input type="file"  name="archivo[]"/>
                                            <br/>
                                            <br/>
                                            <div class="cf footer">
                                                <input class="aceptar aceptarSubmit" type="submit" value="Aceptar" />
                                                <a class="cancelar" href="#">Cancelar</a>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                                <div class="overlay"></div>
                            </div>
                            <?php
                        }
                        ?>
                    </table>  
                    <br/>

                    <div class="content-pagenation" id="paginacion" data-pagina="<?php echo $pagina; ?>">
                        <li class="pagina"> <?php echo $enlaces["inicio"]; ?></li>
                        <li class="pagina"> <?php echo $enlaces["anterior"]; ?></li>
                        <li class="pagina"> <?php echo $enlaces["primero"]; ?></li>
                        <li class="pagina"> <?php echo $enlaces["segundo"]; ?></li>
                        <li class="pagina"> <?php echo $enlaces["actual"]; ?></li>
                        <li class="pagina"> <?php echo $enlaces["cuarto"]; ?></li>
                        <li class="pagina"> <?php echo $enlaces["quinto"]; ?></li>
                        <li class="pagina"> <?php echo $enlaces["siguiente"]; ?></li>
                        <li class="pagina"> <?php echo $enlaces["ultimo"]; ?></li>
                    </div>


                    <div id="categorias">
                        <br/>
                        <h2>Categorías </h2>
                        <br/>                        
                        <h2><a href="#modalCategorias">Añadir Categorías</a></h2>
                        <br/>
                        <table  border="1">      
                            <tr>                
                                <th>Nombre</th>    
                            </tr>

                            <?php
                            foreach ($categorias as $key => $categoria) {
                                ?>
                                <tr>
                                    <td><?php echo $categoria->getNombre(); ?></td>  
                                    <td class="botonRojo"> <a  href='#modificarCategoria<?php echo $categoria->getNombre(); ?>'>Modificar</a></td>
                                    <td class="botonRojo"> <a  href='#borrarCategoria<?php echo $categoria->getNombre(); ?>'>Borrar</a></td>
                                </tr>

                                <div class="modal"id="borrarCategoria<?php echo $categoria->getNombre(); ?>" >
                                    <div class="modal-content">
                                        <div class="header tituloForm">
                                            <h2>Borrar Categoria</h2>
                                        </div>
                                        <div class="copy formBorrar">
                                            <br/>
                                            <br/>
                                            <h3><?php echo $categoria->getNombre(); ?></h3> 
                                            <br/>
                                        </div>
                                        <div class="cf footer">
                                            <a class="aceptar" href="Categorias/phpBorrarCategoria.php?nombre=<?php echo $categoria->getNombre(); ?>">Aceptar</a>
                                            <a class="cancelar" href="#">Cancelar</a>
                                            <div class="clear"></div>

                                        </div>
                                    </div>
                                    <div class="overlay"></div>
                                </div>

                                <div class="modal"id="modificarCategoria<?php echo $categoria->getNombre(); ?>" >
                                    <div class="modal-content">
                                        <div class="header tituloFormProdCat">
                                            <h2>Modificar  Categoría</h2>
                                        </div>
                                        <br/>
                                        <div class="copy formModificar">
                                            <form action="Categorias/phpModificarCategorias.php" method="POST" enctype="multipart/form-data">
                                                <input type = "hidden" name = "nombrepk" value = "<?php echo $categoria->getNombre(); ?>"/>
                                                <label class="nombreCategoria">Nombre:</label>
                                                <input type="text" name="nombreNuevo" value="<?php echo $categoria->getNombre(); ?>" maxlength="20" size="20" id="nombre" required/>
                                                <br/>
                                                <br/>
                                                <div class="cf footer">
                                                    <input class="aceptar aceptarSubmit" type="submit" value="Aceptar" />
                                                    <a class="cancelar" href="#">Cancelar</a>
                                                </div>
                                            </form>  
                                        </div>

                                    </div>
                                    <div class="overlay"></div>
                                </div>
                                <?php
                            }
                            ?>
                        </table> 
                    </div>
                    <div class="clear"></div>
                    <br/>
                </div>
            </div>
        </div>
        <?php include '../include/footer2.html'; ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <a href="#" id="toTop"><span id="toTopHover"> </span></a>

        <?php include '../include/modalProductos.php'; ?>
        <?php include '../include/modalCategorias.php'; ?>
</body>
</html>