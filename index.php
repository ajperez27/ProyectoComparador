<?php
require 'require/comun.php';

$bd = new BaseDatos();
$modeloCategoria = new ModeloCategoria($bd);
$categorias = $modeloCategoria->getList(0, $modeloCategoria->count());
$todos = $modeloCategoria->get("Todos");
sort($categorias);

$modeloProducto = new ModeloProducto($bd);
$productos = $modeloProducto->getList(0, $modeloProducto->count());
$nuevosProductos = $modeloProducto->getUltimos(4);

$numeroProductos = 0;

if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
    foreach ($cesta as $key => $detalleCarrito) {
        $numeroProductos += $detalleCarrito->getCantidad();
    }
}
$bd->closeConexion();
?>
<!DOCTYPE HTML>
<head>
    <title>Comparador</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/estilos/estilos.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="shortcut icon" href="Imagenes/favicon.ico" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/startstop-slider.js"></script>
    <script type="text/javascript" src="ajax/script/comparador.js"></script>
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
                        <li><a href="backEnd/viewLogin.php">Iniciar Sesión</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="header_top">
                <div class="logo">
                    <a href="index.php"><img src="Imagenes/logo.png" alt="logo" /></a>
                </div>
                <div class="cart">
                    <p>¡Bienvenido a nuestro comparador online! <span>Carrito:</span>
                    <div id="dd" class="wrapper-dropdown-2"> <span id="cantidadProductos"><?php echo $numeroProductos; ?></span><span> producto(s)</span>
                        <ul class="dropdown">
                            <li>No tienes producto en tu carrito</li>
                        </ul>
                    </div>
                    </p>
                </div>                
                <div class="clear"></div>
            </div>
            <div class="header_bottom">
                <div class="menu">
                    <ul>
                        <li class="active"><a href="index.php">Productos</a></li>
                        <li><a href="Supermercados.php">Supermercados</a></li>
                        <li><a href="contacta.php">Contacta</a></li>
                        <li><a href="acerca de.php">Acerca de</a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
                <div class="search_box">
                    <input id="textoBuscar" type="text" value="Buscar" 
                           onfocus="this.value = '';" onblur="
                                   if (this.value == '')
                                   {
                                       this.value = 'Buscar';
                                   }">
                    <input id="buscar" type="submit" value="">
                </div>
                <div class="clear"></div>
            </div>            
            <div class="header_slide">
                <div class="header_bottom_left">				
                    <div class="categories">
                        <ul>
                            <h3>Categorías</h3>
                            <li class="categoria" id="<?php echo $todos->getNombre(); ?>" ><a href="#"><?php echo $todos->getNombre(); ?></a></li> 
                            <?php
                            foreach ($categorias as $key => $categoria) {
                                if ($categoria->getNombre() !== "Todos") {
                                    ?>
                                    <li class="categoria" id="<?php echo $categoria->getNombre(); ?>" ><a href="#"><?php echo $categoria->getNombre(); ?></a></li> 

                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>					
                </div>

                <div class="header_bottom_right">					 
                    <div class="slider">					     
                        <div id="slider">
                            <div id="mover">
                                <div id="slide-1" class="slide">			                    
                                    <div class="slider-img">
                                        <img src="Imagenes/cerdito.png" alt="hucha" /></a>									    
                                    </div>
                                    <div class="slider-text">
                                        <h1>Ahorra<br><span>Fácil</span></h1>
                                        <h2> Hasta un 20% en tu compra</h2>
                                        <div class="features_list">
                                            <br/>
                                            <h4>Consigue tu cesta de la compra más barata.</h4>							               
                                        </div>
                                    </div>			               
                                    <div class="clear"></div>				
                                </div>	
                                <div class="slide">
                                    <div class="slider-text">
                                        <h1>Compara<br><span>ya</span></h1>
                                        <h2>En sólo unos minutos</h2>
                                        <br/>
                                        <div class="features_list">
                                            <h4>Compara los precios a golpe de ratón.</h4>							               
                                        </div>
                                    </div>		
                                    <div class="slider-img">
                                        <img src="Imagenes/comprar.png" alt="comprar" /></a>
                                    </div>						             					                 
                                    <div class="clear"></div>				
                                </div>
                                <div class="slide">						             	
                                    <div class="slider-img">
                                        <img id="descanso" src="Imagenes/descanso.png" alt="descanso" /></a>
                                    </div>
                                    <div class="slider-text">
                                        <h1>Desde<br><span>Casa</span></h1>
                                        <h2>No pierdas tiempo</h2>
                                        <br/>
                                        <div class="features_list">
                                            <h4>Haz tu lista de la compra con los precios más económicos.</h4>							               
                                        </div>
                                    </div>	
                                    <div class="clear"></div>				
                                </div>												
                            </div>		
                        </div>
                        <div class="clear"></div>					       
                    </div>
                </div>

                <div class="clear"></div>
            </div>            
        </div>
        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="heading">
                        <h3>Nuevos Productos</h3>
                    </div>
                    <!--<div class="see">
                        <p><a href="#">Ver todos los productos</a></p>
                    </div>-->
                    <div class="clear"></div>
                </div>
                <div class="section group" id="contenedorProductos" >


                    <?php
                    foreach ($nuevosProductos as $key => $producto) {
                        $ruta = substr($producto->getFoto(), 6, strlen($producto->getFoto()) - 3);
                        ?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <img width="70%" src="<?php echo $ruta; ?>" alt="" />
                            <h2><?php echo $producto->getNombre(); ?> </h2>
                            <div class="price-details">
                                <div class="price-number">
                                    <p><img class="logoSuper2" src ="Imagenes/supermercados/comparar/CDia.png" alt="Dia"/><span class="rupees euros"><?php echo $producto->getPrecioDia(); ?>€</span></p>
                                    <p><img class="logoSuper2" src ="Imagenes/supermercados/comparar/CCoviran.png" alt="Coviran"/><span class="rupees euros"><?php echo $producto->getPrecioCoviran(); ?>€</span></p>
                                    <p><img class="logoSuper2" src ="Imagenes/supermercados/comparar/CAlcampo.png" alt="Alcampo"/><span class="rupees euros"><?php echo $producto->getPrecioAlcampo(); ?>€</span></p>
                                    <p><img class="logoSuper2" src ="Imagenes/supermercados/comparar/CCarrefour.png" alt="Carrefour"/><span class="rupees euros"><?php echo$producto->getPrecioCarrefour(); ?>€</span></p>
                                    <div class="add-cart añadirCarro" id='<?php echo $producto->getIdProducto(); ?>' >
                                        <h4><a href="#" >Añadir al Carrito</a></h4>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="content_bottom">
                    <div class="heading">
                        <h3>Productos Destacados</h3>
                    </div>
                    <!--<div class="see">
                        <p><a href="#">See all Products</a></p>
                    </div>-->
                    <div class="clear"></div>
                </div>
                <div class="section group">

                    <?php
                    $numeros = array();
                    $producto = new Producto();
                    if (sizeof($productos) > 0) {
                        for ($i = 0; $i < 4; $i++) {
                            do {
                                $aleatorio = mt_rand(0, sizeof($productos) - 1);
                            } while (in_array($aleatorio, $numeros) && sizeof($productos) > 3);
                            $numeros[] = $aleatorio;
                            $producto = $productos[$aleatorio];
                            $ruta = substr($producto->getFoto(), 6, strlen($producto->getFoto()) - 3);
                            ?>
                            <div class="grid_1_of_4 images_1_of_4">
                                <img width="70%" src="<?php echo $ruta; ?>" alt="" />
                                <h2><?php echo $producto->getNombre(); ?> </h2>
                                <div class="price-details">
                                    <div class="price-number">
                                        <p><img class="logoSuper2" src ="Imagenes/supermercados/comparar/CDia.png" alt="Dia"/><span class="rupees euros"><?php echo $producto->getPrecioDia(); ?>€</span></p>
                                        <p><img class="logoSuper2" src ="Imagenes/supermercados/comparar/CCoviran.png" alt="Coviran"/><span class="rupees euros"><?php echo $producto->getPrecioCoviran(); ?>€</span></p>
                                        <p><img class="logoSuper2" src ="Imagenes/supermercados/comparar/CAlcampo.png" alt="Alcampo"/><span class="rupees euros"><?php echo $producto->getPrecioAlcampo(); ?>€</span></p>
                                        <p><img class="logoSuper2" src ="Imagenes/supermercados/comparar/CCarrefour.png" alt="Carrefour"/><span class="rupees euros"><?php echo$producto->getPrecioCarrefour(); ?>€</span></p>
                                        <div class="add-cart añadirCarro" id='<?php echo $producto->getIdProducto(); ?>' >
                                            <h4><a href="#" >Añadir al Carrito</a></h4>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include './include/footer.html'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $().UItoTop({easingType: 'easeOutQuart'});

        });
    </script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

