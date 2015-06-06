<?php

/**
 * Class ModeloCategoria
 *
 * @version 1.01
 * @author Antonio Javier Pérez Medina
 * @license http://...
 * @copyright izvbycv
 * Esta clase gestiona las categorias con la base de datos.
 */
class ModeloCategoria {

    private $bd;
    private $tabla = "categoria";

    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }

    /**
     * Devuelve -1 si no añade correctamente
     * @access public
     * @return int 
     */
    function add(Categoria $objeto) {
        $sql = "insert into $this->tabla values( :nombre);";
        $parametros["nombre"] = $objeto->getNombre(); 
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        }
        return $this->bd->getAutonumerico();
    }


    /**
     * Devuelve -1 si no borra correctamente
     * @access public
     * @return int 
     */
    function delete(Categoria $objeto) {
        $sql = "delete from $this->tabla where nombre = :nombre;";
        $parametros["nombre"] = $objeto->getNombre();
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }

  /**
     * Devuelve el resultado del borrado
     * @access public
     * @return int 
     */
    function deletePorNombre($nombre) {
        return $this->delete(new Categoria($nombre));
    }

   /**
     * Devuelve -1 si no edita correctamente
     * @access public
     * @return int 
     */
    
    
    function edit(Categoria $objeto, $nombrepk) {
        $sql = "update $this->tabla set nombre = :nombre where nombre = :nombrepk;";      
        $parametros["nombre"] = $objeto->getNombre();     
        $parametros["nombrepk"] = $nombrepk;
        $r = $this->bd->setConsulta($sql, $parametros);

        if (!$r) {
            return -1;
        }
        return $this->bd->getNumeroFilas(); //0
    }    
    

    /**
     * Devuelve -1 si no edita correctamente por la primary key antigua
     * @access public
     * @return int 
     */
    function editPK(Categoria $objetoOriginal, Categoria $objetoNuevo) {
        $sql = "update $this->tabla set nombre = :nombre where nombre = :nombrepk";     
        $parametros["nombre"] = $objetoNuevo->getNombre(); 
        $parametros["nombrepk"] = $objetoOriginal->getNombre();
        $r = $this->bd->setConsulta($sql, $parametros);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumeroFilas();
    }

  /**
     * Devuelve la categoria buscada
     * @access public
     * @return Categoria $categoria
     */
    function get($nombre) {
        $sql = "select * from $this->tabla where nombre = :nombre";
        $parametros["nombre"] = $nombre;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $categoria = new Categoria();
            $categoria->set($this->bd->getFila());
            return $categoria;
        }
        return null;
    }

      /**
     * Devuelve -1 si no realiza la consulta corectamente
     * @access public
     * @return int 
     */
    function count($condicion = "1=1", $parametros = array()) {
        $sql = "select count(*) from $this->tabla where $condicion";
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $aux = $this->bd->getFila();
            return $aux[0];
        }
        return -1;
    }
    
     /**
     * Devuelve el numeo de paginas
     * @access public
     * @return int 
     */
    function getNumeroPaginas($rpp = Configuracion::RPP) {
        $lista = $this->count();
        return (ceil($lista[0] / $rpp) - 1);
    }

  /**
     * Devuelve un array con las categorias
     * @access public
     * @return array $list
     */
     function getList($pagina = 0, $rpp = Configuracion::RPP, $condicion = "1=1", $parametros = array(), $orderby = "1") {
        $list = array();
        $principio = $pagina * $rpp;
        $sql = "select * from $this->tabla where $condicion order by $orderby limit $principio,$rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            while ($fila = $this->bd->getFila()) {
                $categoria = new Categoria();
                $categoria->set($fila);
                $list[] = $categoria;
            }
        } else {
            return null;
        }
        return $list;
    }

    function getListPagina($pagina = 0, $rpp = Configuracion::RPP, $condicion = "1=1", $parametros = array(), $orderby = "1") {
        $pos = $pagina * $rpp;
        $sql = "select * from "
                . $this->tabla .
                " where $condicion order by $orderby limit $pos, $rpp";
        $r = $this->bd->setConsulta($sql, $parametros);
        $respuesta = array();
        while ($fila = $this->bd->getFila()) {
            $objeto = new Categoria();
            $objeto->set($fila);
            $respuesta[] = $objeto;
        }
        return $respuesta;
    }

    function getTabla() {
        return $this->tabla;
    }

        /**
     * Devuelve una lista con los productos en formato Json
     * @access public
     * @return int 
     */
    function getListJSON($pagina = 0, $rpp = Configuracion::RPP, $condicion = "1=1", $parametros = array(), $orderby = "1") {
        $pos = $pagina * $rpp;
        $sql = "select * from $this->tabla where $condicion order by $orderby limit $pos, $rpp";
        $this->bd->setConsulta($sql, $parametros);
        $r = "[ ";
        while ($fila = $this->bd->getFila()) {
            $objeto = new Categoria();
            $objeto->set($fila);
            $r .=$objeto->getJSON() . ",";
        }

        $r = substr($r, 0, -1) . "]";
        return $r;
    }

    function getJSON($id) {
        return $this->get($id)->getJSON();
    }

  /**
     * Devuelve un los select con las categorias
     * @access public
     * @return array $list
     */
    function selectHtml($nombre, $name, $condicion, $parametros, $orderby = 1, $valorSeleccionado = "", $blanco = true, $textoBlanco = "&nbsp;") {
        $select = "<select name='$name' nombre,='$nombre,'>";
        $select .="</select>";
        if ($blanco) {
            $select .="<option value=''>$textoBlanco</option>";
        }
        $lista = $this->getList($condicion, $parametros, $orderby);
        foreach ($lista as $objeto) {
            $selected = "";
            if ($objeto->getNombre() == $valorSeleccionado) {
                $selected = "selected";
            }
            $select .="<option $selected value='" . $objeto->getNombre() . "'>" . $objeto->getNombre() . "</option>";
        }
        $select .= "</select>";
        return $select;
    }
}
?>
