<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

	public function index()
	{

		if ((isset($_SESSION['User']))){
		$datos['mostrarImagen']=true;
		$this->load->view('cabecera/cabecera');
		
		$this->load->view('cuerpo/inicio-wrapper');
		$this->load->view('cuerpo/menu');
		$this->load->view('cuerpo/menu-lateral');
		$this->load->view('cuerpo/contenido',$datos);
		$this->load->view('cuerpo/pie-cuerpo');

		$this->load->view('cuerpo/fin-wrapper');
		$this->load->view('pie/pie.php');




		}else{

			  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
  			  echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
		}
		
	}

    public function verPersonal()
	{
	    $this->load->model('MaPersonal');

        
		$resultados['personal']=$this->MaPersonal->obtenerPersonal();



		if ((isset($_SESSION['User']))){

			if($_SESSION['User']->sCorreo=="admin@empresa.org"){
				$this->load->view('cabecera/cabecera');
				
				$this->load->view('cuerpo/inicio-wrapper');
				$this->load->view('cuerpo/menu');
				$this->load->view('cuerpo/menu-lateral');
				$datos['personal']=$this->load->view('personal/personal',$resultados,TRUE);
				$this->load->view('cuerpo/contenido',$datos);
				$this->load->view('cuerpo/pie-cuerpo');

				
				$this->load->view('pie/pie.php');
			}else{
			  echo "<script type='text/javascript'>alert('Sin permisos para esta sección.')</script> ";
  			  echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
			}
		}else{
			  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
  			  echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
		}

        
	}

    public function agregarPersona(){
		/**
		 * @about Proporciona un formulario para guardar los datos de la persona.
		 * 
		 */
		if ((isset($_SESSION['User']))){

				$this->load->model('MaPersonal');
				
				
				$datos['puestos']=$this->MaPersonal->obtenerPuestosPersonal();

				$this->load->view('cabecera/cabecera');
				$this->load->view('cuerpo/inicio-wrapper');
				$this->load->view('cuerpo/menu');
				$this->load->view('cuerpo/menu-lateral');
				$datos['nuevoPersonal']=$this->load->view('personal/nuevoPersonal',$datos,TRUE);
				$this->load->view('cuerpo/contenido',$datos);
				$this->load->view('cuerpo/pie-cuerpo');

				
				$this->load->view('pie/pie.php');
			
		}else{
			  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
  			  echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
		}
		

	}
    
    public function guardarPersona(){
		/**
		 * @about Guarda los datos del formulario de personas
		 * 
		 */
            if ((isset($_SESSION['User']))){
                    
                    $this->load->model('MaPersonal');

                    
    
                    $datos['nombre']=$this->input->post('nombre');
                    $datos['paterno']=$this->input->post('paterno');
                    $datos['materno']=$this->input->post('materno');
                    $datos['curp']=$this->input->post('curp');
                    $datos['puesto']=$this->input->post('puesto');

                    $respuesta=$this->MaPersonal->guardaPersona($datos);
                    
                    if ($respuesta==true){
                        $result['error']=false;
                        $result['mensaje']="";

                    }else{
                        $result['error']=true;
                        $result['mensaje']="Error al guardar en la base de datos.";
    
                    }
    
                    echo json_encode($result);

            }else{
                  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
                    echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
            }
            
    
        
		

	}

    

    public function actualizaPersona(){
		/**
		 * @about Actualiza los datos del formulario de edición de persona
		 * 
		 */
            if ((isset($_SESSION['User']))){
                    
                    $this->load->model('MaPersonal');

                    
                    $datos['idPersonal']=$this->input->post('idPersonal');
                    $datos['nombre']=$this->input->post('nombre');
                    $datos['paterno']=$this->input->post('paterno');
                    $datos['materno']=$this->input->post('materno');
                    $datos['curp']=$this->input->post('curp');
                    $datos['puesto']=$this->input->post('puesto');

                    $respuesta=$this->MaPersonal->actualizaPersona($datos);
                    
                    if ($respuesta==true){
                        $result['error']=false;
                        $result['mensaje']="";

                    }else{
                        $result['error']=true;
                        $result['mensaje']="Error al guardar en la base de datos.";
    
                    }
    
                    echo json_encode($result);

            }else{
                  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
                    echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
            }
            
    
        
		

	}

    public function consultarPersona(){
		/**
		 * @about Obtiene datos para las vistas de visualizar datos de personal
		 * 
		 */
            if ((isset($_SESSION['User']))){
                    
                    $this->load->model('MaPersonal');

                    $datos['idPersona']=$this->input->post('idPersona');
                  
                    $respuesta['datosPersonales']=$this->MaPersonal->obtenerPersonal($datos['idPersona']);
                    $datos['datosVistaHTMLPersona']=$this->load->view('personal/vistaLecturaPersonal',$respuesta,TRUE);
                    
                    if ($respuesta==true){
                        $result['error']=false;
                        $result['mensaje']="";
                        $result['datos']=$datos['datosVistaHTMLPersona'];

                    }else{
                        $result['error']=true;
                        $result['mensaje']="Error al recuperar los datos.";
                        $result['datos']="";
    
                    }
    
                    echo json_encode($result);

            }else{
                  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
                    echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
            }
            
    
        
		

	}
   
    public function editarPersona(){
		/**
		 * @about Obtiene datos para la vistas de editar datos de personal
		 * 
		 */
            if ((isset($_SESSION['User']))){
                    
                    $this->load->model('MaPersonal');

                    $datos['idPersona']=$this->input->post('idPersona');
                  
                    $respuesta['datosPersonales']=$this->MaPersonal->obtenerPersonal($datos['idPersona']);
                    $respuesta['puestos']=$this->MaPersonal->obtenerPuestosPersonal();
                    $datos['datosVistaHTMLPersona']=$this->load->view('personal/vistaEdicionPersonal',$respuesta,TRUE);
                    
                    if ($respuesta==true){
                        $result['error']=false;
                        $result['mensaje']="";
                        $result['datos']=$datos['datosVistaHTMLPersona'];

                    }else{
                        $result['error']=true;
                        $result['mensaje']="Error al recuperar los datos.";
                        $result['datos']="";
    
                    }
    
                    echo json_encode($result);

            }else{
                  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
                    echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
            }
            
    
        
		

	}

    public function eliminarPersona(){
		/**
		 * @about Elimina el registro de una persona.
		 * 
		 */
            if ((isset($_SESSION['User']))){
                    
                    $this->load->model('MaPersonal');

                    $datos['idPersona']=$this->input->post('idPersona');
                  
                    $respuesta=$this->MaPersonal->eliminaPersonal($datos['idPersona']);
                    
                    
                    
                    if ($respuesta==true){
                        $result['error']=false;
                        $result['mensaje']="";

                    }else{
                        $result['error']=true;
                        $result['mensaje']="Error al ejecutar operación.";

    
                    }
    
                    echo json_encode($result);

            }else{
                  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
                    echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
            }
            
    
        
		

	}

    


    

}
