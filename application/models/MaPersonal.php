<?php

class MaPersonal extends CI_Model {

    function __construct() {
        $this->load->database();
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }
    
   function obtenerPersonal(){
    /**
     * 
     * @about Función para obtener a los empleados (personal). 
     *
     * */    
        $query="select
                mp.idPersonal 
                , mp.sNombre 
                , mp.sPaterno
                , mp.sMaterno
                , mp.sCURP
                , mp.idPuesto
                , cpp.sPuesto 
                from maPersonal mp
                left join catPuestoPersonal cpp 
                on mp.idPuesto =cpp.idPuesto 
                order by mp.idPersonal asc";
        return $this->db->query($query)->result();
    }

    function obtenerPuestosPersonal(){
        /**
         * @about Obtiene la lista de puestos de personal.
         */
        $query="select
                 idPuesto
                ,sPuesto
                from 
                catPuestoPersonal";
        return $this->db->query($query)->result();

    }

    function guardaPersona($datos){
        /**
         * @about Obtiene la lista de puestos de personal.
         */
        $query="insert into
                maPersonal
                (sNombre, sPaterno, sMaterno, sCURP, idPuesto)
                values
                ('".$datos['nombre']."','".$datos['paterno']."','".$datos['materno']."','".$datos['curp']."',".$datos['puesto'].")";
        $respuesta=$this->db->simple_query($query);
        return $respuesta;

    }

}
?>