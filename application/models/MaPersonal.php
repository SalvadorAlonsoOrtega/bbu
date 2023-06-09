<?php

class MaPersonal extends CI_Model {

    function __construct() {
        $this->load->database();
        parent::__construct();
        
    }
    
   function obtenerPersonal($idPersona=0){
    /**
     * 
     * @about Función para obtener a los empleados (personal). 
     *
     * */    
    if ($idPersona==0){
        $strWhere="";
    }else{
        $strWhere=" where mp.idPersonal=" . $idPersona . " ";
    }


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
                ".$strWhere."
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
         * @about Guarda los datos de una persona por primera vez.
         */
        $query="insert into
                maPersonal
                (sNombre, sPaterno, sMaterno, sCURP, idPuesto)
                values
                ('".$datos['nombre']."','".$datos['paterno']."','".$datos['materno']."','".$datos['curp']."',".$datos['puesto'].")";
        $respuesta=$this->db->simple_query($query);
        return $respuesta;

    }
    
    function actualizaPersona($datos){
        /**
         * @about Actualiza los datos de una persona previamente registrada.
         */
        $query="update
                maPersonal
                set 
                sNombre='".$datos['nombre']."',
                sPaterno='".$datos['paterno']."',
                sMaterno='".$datos['materno']."',
                sCURP='".$datos['curp']."',
                idPuesto=".$datos['puesto']."
                where idPersonal=".$datos['idPersonal'];
        $respuesta=$this->db->simple_query($query);
        return $respuesta;

    }

    
    function eliminaPersonal($idPersona){
        /**
         * @about Elimina persona.
         */
        $query="delete from maPersonal where idPersonal=".$idPersona;
        $respuesta=$this->db->simple_query($query);
        return $respuesta;

    }
    

}
?>