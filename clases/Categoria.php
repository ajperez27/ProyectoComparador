<?php

/**
 * Class Categoria
 *
 * @version 1.01
 * @author Antonio Javier Pérez Medina
 * @license http://...
 * @copyright izvbycv
 * Esta clase gestiona categorias.
 */
class Categoria {

    private $nombre;

    function __construct($nombre = null) {
        $this->nombre = $nombre;
    }

    function set($datos, $inicio = 0) {
        $this->nombre = $datos[0 + $inicio];
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
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
            $resp.='"' . $key . '":' . json_encode(htmlspecialchars_decode($value)) . ',';
        }
        $resp = substr($resp, 0, -1) . "}";
        return $resp;
    }

}

?>
