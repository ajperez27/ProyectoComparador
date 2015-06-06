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
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/mapa/mapa.js"></script>
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
                    <p>¡Bienvenido a nuestro comparador online!             
                    </p>
                </div>                
                <div class="clear"></div>
            </div>
            <div class="header_bottom">
                <div class="menu">
                    <ul>
                        <li><a href="index.php">Productos</a></li>
                        <li class="active"><a href="supermercados.php">Supermercados</a></li>
                        <li><a href="contacta.php">Contacta</a></li>
                        <li><a href="acerca de.php">Acerca de</a></li>
                        <div class="clear"></div>
                    </ul>
                </div>       
                <div class="clear"></div>
            </div>  
            <div class="main">
                <div class="content">  
                    <br/>
                    <h2>Encuentra tu supermercado más cercano</h2>
                    <br/>
                    <div id="mapa">
                    </div> 
                    <br/>
                    <br/>
                    <h3 id="nuevoSuper">¿Hás descubierto un supermercado nuevo? Comunícanoslo <a href="contacta.php">aquí</a>.</h3>
                    <br/>
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

