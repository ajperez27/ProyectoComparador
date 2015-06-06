<?php
require 'require/comun.php';

$r = Leer::get('r');
$numeroProductos = 0;

if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
    foreach ($cesta as $key => $detalleCarrito) {
        $numeroProductos += $detalleCarrito->getCantidad();
    }
}
?>
<!DOCTYPE HTML>
<head>
    <title>Comparador</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
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
                        <li ><a href="index.php">Productos</a></li>
                        <li><a href="Supermercados.php">Supermercados</a></li>
                        <li class="active"><a href="contacta.php">Contacta</a></li>
                        <li><a href="acerca de.php">Acerca de</a></li>
                        <div class="clear"></div>
                    </ul>
                </div>

                <div class="clear"></div>
            </div>            
        </div>
        <div class="main">
            <div class="content">
                <div class="section group">
                    <div class="col span_2_of_3">
                        <div class="contact-form">
                            <h2>Contactanos</h2>
                            <h2><?php echo $r; ?> </h2>
                            <form method="post" action="frontEnd/phpEnviarCorreo.php">
                                <div>
                                    <span><label>Nombre</label></span>
                                    <span><input name="nombre" type="text" class="textbox" required ></span>
                                </div>
                                <div>
                                    <span><label>E-mail</label></span>
                                    <span><input name="email" type="email" class="textbox" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" required></span>
                                </div>
                                <div>
                                    <span><label>Asunto</label></span>
                                    <span><input name="asunto" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Mensaje</label></span>
                                    <span><textarea name="mensaje" required> </textarea></span>
                                </div>
                                <div>
                                    <span><input type="submit" value="Enviar"  class="myButton"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col span_1_of_3">
                        <div class="contact_info">
                            <h3>Encuentranos aquí</h3>
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1588.8837012205754!2d-3.653645127019772!3d37.20575373637324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sus!4v1433418037365" width="100%" height="175" frameborder="0" style="border:0"></iframe>                                
                                <br>
                                <small>
                                    <a href="https://www.google.com/maps/@37.2054424,-3.6537182,17z?hl=es-ES" style="color:#666;text-align:left;font-size:12px">Ver más grande</a>
                                </small>
                            </div>
                        </div>
                        <div class="company_address">
                            <h3>Informacion :</h3>
                            <p>Poligono "La Ermita" Edificio CEG,</p>
                            <p>18230 Atarfe, Granada</p>
                            <p>España</p>
                            <p>Teléfono:958 00 00 00</p>
                            <p>Fax: 958 00 00 01</p>
                            <p>Email: <span>proyectocomparador@gmail.com</span></p>
                            <p>Siguenos: <span>Facebook</span>, <span>Twitter</span></p>
                        </div>
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

