<?php

header('Content-Type: application/json');

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');

$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}

$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);

$enlaces = Paginacion::getEnlacesPaginacionJSON($pagina, $modelo->count(), Configuracion::RPP);

session_start();

if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
    if (!$cesta) {
        $resp = '{"r": 0}';
    } else {
        $resp = '{"r": 1,"paginas":' . json_encode($enlaces) . ',"carrito":[';

        foreach ($cesta as $key => $detalleCarrito) {
            $producto = $modelo->get($detalleCarrito->getIdProducto());
            $resp.=
                    '{ "idProducto":' . json_encode(htmlspecialchars_decode($producto->getIdProducto())) . ','
                    . '"nombre":' . json_encode(htmlspecialchars_decode($producto->getNombre())) . ','
                    . '"tipo":' . json_encode(htmlspecialchars_decode($producto->getTipo())) . ','
                    . '"cantidad":' . json_encode(htmlspecialchars_decode($detalleCarrito->getCantidad())) . ','
                    . '"precioAlcampo":' . json_encode(htmlspecialchars_decode($producto->getPrecioAlcampo())) . ','
                    . '"precioCarrefour":' . json_encode(htmlspecialchars_decode($producto->getPrecioCarrefour())) . ','
                    . '"precioCoviran":' . json_encode(htmlspecialchars_decode($producto->getPrecioCoviran())) . ','
                    . '"precioDia":' . json_encode(htmlspecialchars_decode($producto->getPrecioDia())) . ','
                    . '"foto":' . json_encode(htmlspecialchars_decode($producto->getFoto())) . '},';
        }
        $resp = substr($resp, 0, -1) . "]}";
    }
} else {
    $resp = '{"r": 0}';
}

/* $resp.= '"' . $key . '":' . json_encode(htmlspecialchars_decode($value)) . ',';


  $producto = $modelo->get($detalleCarrito->getIdProducto());
  $datos = array(
  "idProducto" => $producto->getIdProducto(),
  "nombre" => $producto->getNombre(),
  "precioAlcampo" => $producto->getPrecioAlcampo(),
  "precioCarrefour" => $producto->getPrecioCarrefour(),
  "precioCoviran" => $producto->getPrecioCoviran(),
  "precioDia" => $producto->getPrecioDia(),
  "foto" => $producto->getFoto(),
  "cantidad" => $detalleCarrito->getCantidad()
  ); */

//echo '{"r": 1,"paginas":' . json_encode($enlaces) . ',"productos":' . $modelo->getListJSON($pagina, Configuracion::RPP) . '}';

echo $resp;
$bd->closeConexion();



