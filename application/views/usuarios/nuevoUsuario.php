<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">

	<div class="col-lg-12 text-center">
		
		<h2><strong>Agregar usuario</strong></h2>

	</div>

</div>

<div class="row">
	<div class="col-md-2">

	</div>

	<div class="col-md-8 ">

	
			<form id="frmNuevoUsuario">
			  <div class="form-group">
			    <label for="nombre">NOMBRE</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
			  </div>
			  <div class="form-group">
			    <label for="paterno">PATERNO</label>
			    <input type="text" class="form-control" id="paterno" name="paterno"  placeholder="Apellido paterno">
			  </div>

			  <div class="form-group">
			    <label for="materno">MATERNO</label>
			    <input type="text" class="form-control" id="materno" name="materno"  placeholder="Apellido materno">
			  </div>

			  <div class="form-group">
			    <label for="correo">CORREO</label>
			    <input type="email" class="form-control" id="correo" name="correo"  placeholder="correo electrónico">
			  </div>

			  <div class="form-group">
			    <label for="usuario">USUARIO</label>
			    <input type="text" class="form-control" id="usuario" name="usuario"  placeholder="Usuario">
			  </div>

			  <div class="form-group">
			    <label for="clave">CLAVE</label>
			    <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
			  </div>

			  <div class="form-group">
			    <label for="clave2">REPETIR CLAVE</label>
			    <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repetir contraseña">
			  </div>



 
			 <div class="form-group">
			    <label for="admin">Es Administrador</label>
			    <select class="form-control" id="admin" name="admin" >
			      <option>SI</option>
			      <option>NO</option>
			    </select>
			  </div>

			 <div class="form-group">
			    <label for="estado">Activo</label>
			    <select class="form-control" id="estado" name="estado">
			      <option>SI</option>
			      <option>NO</option>
			    </select>
			  </div>
			  <a  class="btn btn-danger" href="<?php echo site_url("usuario/usuarios")?>">Regresar</a>
			  <button type="button" class="btn btn-success" onclick="guardar()">Guardar</button>
			  
			</form>
		

	</div>


	<div class="col-md-2">

	</div>



</div>

<script type="text/javascript">

function guardar(){

	if ($("#clave").val()!=$("#clave2").val()){
		alert("las claves no son identicas");
		return 0;
	}
	parametros=$("#frmNuevoUsuario").serialize();
	

	 $.ajax({
	        url: SiteUrl + "/Usuario/guardarUsuario",
	        dataType: 'html',
	        data: parametros,
	        method: 'post'
	    })
	    .done(function (html) {

	    	html=JSON.parse(html);
	    	if (html.error==true){
	        	swal.fire("Error al registrar usuario", html.mensaje, "error");      
	    	}else{

				swal.fire("Registro de usuario", "Usuario registrado con éxito" , "success");      
	    	}

	    	
	        
	    });
	

}



</script>
