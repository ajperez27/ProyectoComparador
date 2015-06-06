<?php

require '../require/comun.php';

$nombre = Leer::post("nombre");
$email = Leer::post("email");
$asunto = Leer::post("asunto");
$mensaje = Leer::post("mensaje");

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

$headers .= "From: " . $nombre . " <" . $email . ">\r\n";

$r = mail("proyectocomparador@gmail.com", $asunto, $mensaje, $headers);

if($r)
{
    header("Location: ../contacta.php?r=Mensaje Enviado");
}
else{
    header("Location: ../contacta.php?r=Error al enviar el email");
}


