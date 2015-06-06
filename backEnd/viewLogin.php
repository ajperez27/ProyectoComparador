<?php
require '../require/comun.php';
if ($sesion->isAdministrador()) {
    header("Location: index.php");
}
$error = Leer::get("error");
?>
<!DOCTYPE HTML>
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
                        <li><a href="../backEnd/viewLogin.php">Iniciar Sesión</a></li>
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
            <div class="header_slide">

            </div>
            <div class="main">
                <div class="content" id="divLoginClave">
                    <br>
                    <h2><?php echo $error; ?> </h2>
                    <h2>Introduzca su Login y su clave</h2>
                    <br/>
                    <br/>
                    <form action="phplogin.php" method="POST">
                        <label>Login</label>
                        <input class="textoLoginClave" type="text" name="login" value="" required/>
                        <label>Clave</label>
                        <input class="textoLoginClave" type="password" name="clave" value=""  required/>
                        <br/><br/>
                        <br/>
                        <br/>
                        <input class="logearse" type="submit" value="Entrar" />
                    </form>
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
</body>
</html>

