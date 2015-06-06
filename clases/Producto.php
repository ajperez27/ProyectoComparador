<?php

/**
 * Class Producto
 *
 * @version 1.01
 * @author Antonio Javier Pérez Medina
 * @license http://...
 * @copyright izvbycv
 * Esta clase crea los productos.
 */
class Producto {

    private $idProducto;
    private $nombre;
    private $tipo;
    private $precioAlcampo;
    private $precioCarrefour;
    private $precioCoviran;
    private $precioDia;
    private $foto;

    function __construct($idProducto = null, $nombre = null, $tipo = null, 
                        $precioAlcampo = null, $precioCarrefour = null, 
                        $precioCoviran = null, $precioDia = null, $foto = null) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->precioAlcampo = $precioAlcampo;
        $this->precioCarrefour = $precioCarrefour;
        $this->precioCoviran = $precioCoviran;
        $this->precioDia = $precioDia;
        $this->foto = $foto;
    }

    function set($datos, $inicio = 0) {
        $this->idProducto = $datos[0 + $inicio];
        $this->nombre = $datos[1 + $inicio];
        $this->tipo = $datos[2 + $inicio];
        $this->precioAlcampo = $datos[3 + $inicio];
        $this->precioCarrefour = $datos[4 + $inicio];
        $this->precioCoviran = $datos[5 + $inicio];
        $this->precioDia = $datos[6 + $inicio];
        $this->foto = $datos[7 + $inicio];
    }
    function getIdProducto() {
        return $this->idProducto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTipo() {
        return $this->tipo;
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

    function getFoto() {
        return $this->foto;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
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

    function setFoto($foto) {
        $this->foto = $foto;
    }

    /**
     * Devuelve un objeto en formato JSON
     * @access public
     * @return int 
     */
    public function getJSON() {
        $prop = get_object_vars($this);
        $resp = "{ ";
        foreach ($prop as $key => $value) {
            $resp.= '"' . $key . '":' . json_encode(htmlspecialchars_decode($value)) . ',';
        }
        $resp = substr($resp, 0, -1) . "}";
        return $resp;
    }

}

?>
