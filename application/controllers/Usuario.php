<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	// FUNCION PARA INICIAR SESIÓN
	public function iniciarSesion(){
		$this->load->model('MaUsuarios');
        $Login = $this->input->post('user');
        $result = $this->MaUsuarios->Login($Login, $this->input->post('password'));

        if ($result['Exito'] == 1) {
            $_SESSION['User'] = $result['Informacion'];
            $_SESSION['User']->NombreCompleto=$result['Informacion']->sNombre.' '.$result['Informacion']->sPaterno.' '.$result['Informacion']->sMaterno;
            $_SESSION['User']->sClave='';
            $Data = array('Exito' => 1);

        } else {
            $Data = array('Exito' => 0);
        }
        echo json_encode($Data);
	}

	// OBTIENEN LA LISTA DE TODOS LOS USUARIOS
	public function usuarios(){
		$this->load->model('MaUsuarios');



		$usuarios['resultados']=$this->MaUsuarios->obtenerUsuarios();


		if ((isset($_SESSION['User']))){

			if($_SESSION['User']->sCorreo=="admin@centroalbatros.org"){
				$this->load->view('cabecera/cabecera');
				
				$this->load->view('cuerpo/inicio-wrapper');
				$this->load->view('cuerpo/menu');
				$this->load->view('cuerpo/menu-lateral');
				$datos['usuarios']=$this->load->view('usuarios/usuarios',$usuarios,TRUE);
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

	// PREPARA FORMULARIO PARA NUEVO REGISTRO

	public function solicitaRegistro(){
		//$this->load->model('MaUsuarios');
		//$usuarios['resultados']=$this->MaUsuarios->obtenerUsuarios();

		$vacio=null;

		if ((isset($_SESSION['User']))){
		

			if($_SESSION['User']->bEsAdmin=="1"){

				$this->load->view('cabecera/cabecera');
				
				$this->load->view('cuerpo/inicio-wrapper');
				$this->load->view('cuerpo/menu');
				$this->load->view('cuerpo/menu-lateral');
				$datos['frmRegistroUsuario']=$this->load->view('usuarios/nuevoUsuario',$vacio,TRUE);
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

	// FUNCION PARA GUARDAR NUEVO USUARI0
	public function guardarUsuario(){
		$this->load->model('MaUsuarios');
        
       	$datos['nombre'] = $this->input->post('nombre');
        $datos['paterno'] = $this->input->post('paterno');
        $datos['materno'] = $this->input->post('materno');
        $datos['correo'] = $this->input->post('correo');
        $datos['usuario'] = $this->input->post('usuario');
        $datos['clave'] = password_hash($this->input->post('clave'),PASSWORD_BCRYPT);
        $datos['admin'] = ($this->input->post('admin')=="SI"?1:0);
        $datos['estado'] = ($this->input->post('estado')=="SI"?1:0);
        

        $resultado = $this->MaUsuarios->existeUsuario($datos['usuario']);


        if ($resultado==true){
        	$result['error']=true;
        	$result['mensaje']="Ya existe el usuario " . $datos['usuario'];
        	echo json_encode($result);
        	die();

        }



        $result = $this->MaUsuarios->guardarUsuario($datos);

        if  ($result==false){

        	$result['error']=true;
			$result['mensaje']="Error al guardar en base de datos";
        }

        echo json_encode($result);



	}

	// FUNCION PARA PREPARAR FORMULARIO DE EDICION DE USUARIO

	public function solicitaEditarUsuario($idUsuario){

		$this->load->model('MaUsuarios');

		if ((isset($_SESSION['User']))){

			if($_SESSION['User']->bEsAdmin=="1"){
		
				$this->load->view('cabecera/cabecera');
				
				$this->load->view('cuerpo/inicio-wrapper');
				$this->load->view('cuerpo/menu');
				$this->load->view('cuerpo/menu-lateral');

				$datos['usuario']= $this->MaUsuarios->obtenerDatosUsuario($idUsuario);
				
				$datos['frmEditarUsuario']=$this->load->view('usuarios/editarUsuario',$datos,TRUE);
				$this->load->view('cuerpo/contenido',$datos);
				$this->load->view('cuerpo/pie-cuerpo');

			}else{
			  echo "<script type='text/javascript'>alert('Sin permisos para esta sección.')</script> ";
  			  echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";								

			}

			
			$this->load->view('pie/pie.php');
		}else{
			  echo "<script type='text/javascript'>alert('La sessión ha expirado.')</script> ";
  			  echo "<script type='text/javascript'>window.location.replace('". site_url() ."')</script>";
		}

	}

	// FUNCION PARA ACTUALIZAR DATOS DE USUARIO, SIN CONTRASEÑA
	public function actualizarUsuario(){
		$this->load->model('MaUsuarios');
        
        $datos['idusuario'] = $this->input->post('idUsuario');
       	$datos['nombre'] = $this->input->post('nombre');
        $datos['paterno'] = $this->input->post('paterno');
        $datos['materno'] = $this->input->post('materno');
        $datos['correo'] = $this->input->post('correo');
        $datos['usuario'] = $this->input->post('usuario');
        $datos['admin'] = ($this->input->post('admin')=="SI"?1:0);
        $datos['estado'] = ($this->input->post('estado')=="SI"?1:0);
        

        $datosUsuario = $this->MaUsuarios->obtenerDatosUsuario($datos['idusuario']);
        
       	if ($datosUsuario->sUsuario!=$datos['usuario']){

       		$resultado = $this->MaUsuarios->existeUsuario($datos['usuario']);

       		if ($resultado==true){
	        	$result['error']=true;
	        	$result['mensaje']="Ya existe el usuario " . $datos['usuario'];
	        	echo json_encode($result);
	        	die();

        	}

       	}
        $result = $this->MaUsuarios->actualizarUsuario($datos);

        if  ($result==false){

        	$result['error']=true;
			$result['mensaje']="Error al actualizar en base de datos";
        }

        echo json_encode($result);
	}

	// FUNCION PARA PREPARAR FORMULARIO DE CAMBIO DE CONTRASEÑA

	function cambiarClave($idUsuario){
		$this->load->model('MaUsuarios');

		if ((isset($_SESSION['User']))){
		

			if($_SESSION['User']->bEsAdmin=="1"){
				$this->load->view('cabecera/cabecera');
				
				$this->load->view('cuerpo/inicio-wrapper');
				$this->load->view('cuerpo/menu');
				$this->load->view('cuerpo/menu-lateral');

				$datosUsuario['idUsuario']=$idUsuario;
				
				$datos['frmEditarUsuario']=$this->load->view('usuarios/cambiarClaveUsuario',$datosUsuario,TRUE);
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

	

	public function actualizarClaveUsuario(){
		$this->load->model('MaUsuarios');
        
        $datos['idusuario'] = $this->input->post('idUsuario');
        $datos['clave'] = password_hash($this->input->post('clave'),PASSWORD_BCRYPT);
       	
              
        $result = $this->MaUsuarios->actualizarClaveUsuario($datos);

        if  ($result==false){

        	$result['error']=true;
			$result['mensaje']="Error al actualizar en base de datos";
        }

        echo json_encode($result);
	}






	public function cerrarSesion(){
		
		session_start();
		session_destroy();
		session_unset();

		$Data = array('Exito' => 1);
		echo json_encode($Data);
	}





}
