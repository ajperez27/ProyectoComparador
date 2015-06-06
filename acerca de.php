<!DOCTYPE HTML>
<head>
    <title>Comparador</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/estilos/estilos.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="shortcut icon" href="Imagenes/favicon.ico" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
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
                    <a href="index.php"><img src="Imagenes/logo.png" alt="" /></a>
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
                        <li><a href="index.php">Productos</a></li>
                        <li><a href="supermercados.php">Supermercados</a></li>
                        <li><a href="contacta.php">Contacta</a></li>
                        <li class="active"><a href="acerca de.php">Acerca de</a></li>
                        <div class="clear"></div>
                    </ul>
                </div> 
                <div class="clear"></div>
            </div>	     	
        </div>
        <div class="main">
            <div class="content">
                <div class="section group">
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Quiénes Somos</h3>
                        <img src="Imagenes/supermercados.jpg" alt="supermercados">
                        <p>Somos una empresa que te facilita la compra, ya que comparamos por tí cientos de productos de varios supermercados para que siempre puedas elegir el precio más económico.</p>
                        <p>Disponemos de una amplia base de datos elaborada por los mejores profesionales, la cual actualizamos diariamente para que nuestros precios siempre sean lo más actuales posibles.</p>
                    </div>
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Nuestra Historia</h3>
                        <div class="history-desc">
                            <div class="year"><p>2010</p></div>
                            <p class="history">Esta idea surgió allá por el verano de 2010 durante una compra en un supermercado, en ese momento nos preguntamos ¿Cómo saber sí un producto determinado  es más barato en otro supermercado?, estaría bien poder consultarlo fácilmente mediante Internet. Esta idea se quedó en eso, una idea. </p>
                            <div class="clear"></div>
                        </div>
                        <div class="history-desc">
                            <div class="year"><p>2013</p></div>
                            <p class="history">En 2013 comenzamos un duro camino  para convertirnos en desarrolladores de aplicaciones Web fueron dos años duros, especialmente el segundo, pero en esta vida con esfuerzo casi todo se consigue y a falta de pequeñas pinceladas parece que se conseguirá. Durante estos años la idea estaba casi olvidada hasta que....</p>
                            <div class="clear"></div>
                        </div>
                        <div class="history-desc">
                            <div class="year"><p>2015</p></div>
                            <p class="history">.... en 2015 finalizando dicho curso se nos "propuso" la idea de realizar un proyecto final que en la medida de los posible englobara los conocimientos adquiridos en estos años y así fue como nos vino a la cabeza aquella idea surgida por verano de 2010 de realizar un comparador de precio online, el resultado..... helo aquí.</p>
                            <div class="clear"></div>
                        </div>

                    </div>
                    <div class="col_1_of_3 span_1_of_3">
                        <h3>Oportunidades</h3>
                        <p>En esta web dispones de la posibilidad de elegir los productos de tu lista de la compra y con un solo click saber donde realizar la compra más barata, en estos momentos disponemos de los siguientes supermercados donde elegir tu cesta de la compra, en breve, más.</p>
                        <div class="list">
                            <ul>                          
                                <li><a href="#">Alcampo</a></li>
                                <li><a href="#">Carrefour</a></li>
                                <li><a href="#">Covirán</a></li>
                                <li><a href="#">Dia</a></li>
                            </ul>
                        </div>
                        <p>Elige tus productos entre un amplio catalogo que aumenta cada día, así como su cantidad y descubre cual tiene los precios más baratos.</p>
                        <p>¿No sabes dónde está tu supermercado más cercano? no te preocupes, en el apartado Supermercados puedes ver un mapa que muestra tu posición ,(se te pedirá permiso para localizarte) y la localización de los supermercados de tu zona para que elijas a cual ir.</p>
                    </div>
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