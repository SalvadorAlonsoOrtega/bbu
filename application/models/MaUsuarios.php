<?php

class MaUsuarios extends CI_Model {

    function __construct() {
        $this->load->database();
        parent::__construct();
    }
    // function getMaximo(){
    //     $query="Select ifnull(max(idusuario),0)+1 as Maximo from ca_usuarios";
    //     $result=$this->db->query($query);
    //     return $result->row()->Maximo;
    // }  
    
    function Login($Login, $Pass) {
        $result=$this->db
                ->select("idUsuario,sNombre,sPaterno,sMaterno,sCorreo,sPassword,bActivo,sCURP")
                ->from('maUsuarios')
                ->where('sCorreo',$Login)  
                ->where('bActivo',1)
                ->get();       

        $Data = array(
            'Exito' => 0, 
            'Informacion' => ''
        );
        if($result->num_rows() === 1){
             
            $data = $result->row(); 
            $dataR= clone $data;


            if(password_verify($Pass,$data->sPassword) === TRUE){
                $Data = array(
                    'Exito' => 1, 
                    'Informacion' => $data
                );
            }
        }
        return $Data;
    }
    

    function obtenerUsuarios(){
        $query="select idUsuario,sNombre,sPaterno,sMaterno,sCorreo,sPassword,bActivo,sCURP from maUsuarios";
        return $this->db->query($query)->result();
    }

    function obtenerDatosUsuario($idUsuario){
        $query="select idUsuario,sNombre,sPaterno,sMaterno,sCorreo,sPassword,bActivo,sCURP from maUsuarios where idUsuario =".$idUsuario;
        return $this->db->query($query)->row();
    }




    function guardarUsuario($datos){
        $query="insert into maUsuarios (snombre, spaterno, smaterno, scorreo, susuario, sclave, besadmin, besactivo) values('".$datos['nombre']."','".$datos['paterno']."','".$datos['materno']."','".$datos['correo']."','".$datos['usuario']."','".$datos['clave']."',".$datos['admin'].",'".$datos['estado']."')";
        return $this->db->simple_query($query);

    }

    function actualizarUsuario($datos){

       $query="UPDATE maUsuarios " .
        "SET snombre='".$datos['nombre']."' , spaterno='".$datos['paterno']."', smaterno='".$datos['materno']."', scorreo='".$datos['correo']."', susuario='".$datos['usuario']."', besadmin=".$datos['admin'].", besactivo=".$datos['estado'] .
        " WHERE idUsuario =" . $datos['idusuario'];

        return $this->db->simple_query($query);

    }

      function actualizarClaveUsuario($datos){

       $query="UPDATE maUsuarios " .
        "SET sclave='".$datos['clave']."'" .
        " WHERE idUsuario =" . $datos['idusuario'];

        return $this->db->simple_query($query);

    }



    function existeUsuario($sUsuario){
        $query="select idUsuario, sNombre,sPaterno , sMaterno, sCorreo , sUsuario , bEsAdmin, bEsActivo from maUsuarios where sUsuario='".trim($sUsuario)."'";
     
        $registros=$this->db->query($query)->result();
        if (sizeof($registros)>0){
            return true;
        }else{
            return false;

        }


    }





   


}
?>