<?php

/**
 * Class DetalleCarrito
 *
 * @version 1.01
 * @author Antonio Javier Pérez Medina
 * @license http://...
 * @copyright izvbycv
 * Esta clase gestiona los detalles del carrito.
 */
class DetalleCarrito {

    private $idDetalleCarrito;
    private $idCarrito;
    private $idProducto;
    private $cantidad;
    private $precioAlcampo;
    private $precioCarrefour;
    private $precioCoviran;
    private $precioDia;
    private $tipo;

    function __construct($idDetalleCarrito = null, $idCarrito = null, $idProducto = null, $cantidad = 0, $precioAlcampo = null, $precioCarrefour = null, $precioCoviran = null, $precioDia = null, $tipo = null) {
        $this->idDetalleCarrito = $idDetalleCarrito;
        $this->idCarrito = $idCarrito;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
        $this->precioAlcampo = $precioAlcampo;
        $this->precioCarrefour = $precioCarrefour;
        $this->precioCoviran = $precioCoviran;
        $this->precioDia = $precioDia;
        $this->tipo = $tipo;
    }

    function set($datos, $inicio = 0) {
        $this->idDetalleCarrito = $datos[0 + $inicio];
        $this->idCarrito = $datos[1 + $inicio];
        $this->idProducto = $datos[2 + $inicio];
        $this->cantidad = $datos[3 + $inicio];
        $this->precioAlcampo = $datos[4 + $inicio];
        $this->precioCarrefour = $datos[5 + $inicio];
        $this->precioCoviran = $datos[6 + $inicio];
        $this->precioDia = $datos[7 + $inicio];
        $this->tipo = $datos[8 + $inicio];
    }

    function getIdDetalleCarrito() {
        return $this->idDetalleCarrito;
    }

    function getIdCarrito() {
        return $this->idCarrito;
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function getCantidad() {
        return $this->cantidad;
    }
    function getPrecioAlcampo() {
        return $this->precioAlcampo;
    }

    function getPrecioCarrefour() {
        return $this->precioCarrefour;
    }

    function getPrecioCoviran() {
        return $this->precioCoviran;
    }

    function getPrecioDia() {
        return $this->precioDia;
    }
    
      function getTipo() {
        return $this->tipo;
    }
    function setPrecioAlcampo($precioAlcampo) {
        $this->precioAlcampo = $precioAlcampo;
    }

    function setPrecioCarrefour($precioCarrefour) {
        $this->precioCarrefour = $precioCarrefour;
    }

    function setPrecioCoviran($precioCoviran) {
        $this->precioCoviran = $precioCoviran;
    }

    function setPrecioDia($precioDia) {
        $this->precioDia = $precioDia;
    }

     
    function setIdDetalleCarrito($idDetalleCarrito) {
        $this->idDetalleCarrito = $idDetalleCarrito;
    }

    function setIdCarrito($idCarrito) {
        $this->idCarrito = $idCarrito;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
  

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

        

    public function getJSON() {
        $prop = get_object_vars($this);
        $resp = '{ ';
        foreach ($prop as $key => $value) {
            $resp.='"' . $key . '":' . json_encode(htmlspecialchars_decode($value)) . ',';
        }
        $resp = substr($resp, 0, -1) . "}";
        return $resp;
    }

}

?>
