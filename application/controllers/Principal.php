<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index()
	{


		if ((isset($_SESSION['User']))){
		// $this->load->view('cabecera/cabecera');
		// $this->load->view('cuerpo');
		// $this->load->view('pie/pie.php');
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
}
