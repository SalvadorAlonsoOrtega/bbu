<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="row">

	<div class="col-lg-12 text-center">
		
		<h2><strong>Editar usuario</strong></h2>

	</div>

</div>

<div class="row">
	<div class="col-md-2">

	</div>

	<div class="col-md-8 ">

	
			<form id="frmNuevoUsuario">
			  <div class="form-group">
			    <label for="nombre">NOMBRE</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $usuario->sNombre; ?>">
			  </div>
			  <div class="form-group">
			    <label for="paterno">PATERNO</label>
			    <input type="text" class="form-control" id="paterno" name="paterno"  placeholder="Apellido paterno" value="<?php echo $usuario->sPaterno; ?>">
			  </div>

			  <div class="form-group">
			    <label for="materno">MATERNO</label>
			    <input type="text" class="form-control" id="materno" name="materno"  placeholder="Apellido materno" value="<?php echo $usuario->sMaterno; ?>">
			  </div>

			  <div class="form-group">
			    <label for="correo">CORREO</label>
			    <input type="email" class="form-control" id="correo" name="correo"  placeholder="correo electrónico" value="<?php echo $usuario->sCorreo; ?>">
			  </div>

			  <div class="form-group">
			    <label for="usuario">USUARIO</label>
			    <input type="text" class="form-control" id="usuario" name="usuario"  placeholder="Usuario" value="<?php echo $usuario->sUsuario; ?>">
			  </div>

			  
			 <div class="form-group">
			    <label for="admin">Es Administrador</label>
			    <select class="form-control" id="admin" name="admin" >
			      <option <?php  echo ($usuario->bEsAdmin=="1"? "selected":"");   ?>  >SI</option>
			      <option <?php  echo ($usuario->bEsAdmin=="0" || gettype($usuario->bEsAdmin)=="NULL" ? "selected":"");   ?>>NO</option>
			    </select>
			  </div>

			 <div class="form-group">
			    <label for="estado">Activo</label>
			    <select class="form-control" id="estado" name="estado">
			      <option <?php  echo ($usuario->bEsActivo=="1"? "selected":"");   ?>  >SI</option>
			      <option <?php  echo ($usuario->bEsActivo=="0" || gettype($usuario->bEsActivo)=="NULL" ? "selected":""); ?>>NO</option>
			    </select>
			  </div>
			  <a  class="btn btn-danger" href="<?php echo site_url("usuario/usuarios")?>">Regresar</a>
			  <button type="button" class="btn btn-success" onclick="editar()">Guardar cambios</button>
			  
			</form>
		

	</div>


	<div class="col-md-2">

	</div>



</div>

<script type="text/javascript">


function editar(){

	idUsuario=<?php echo $usuario->idUsuario; ?>;
	parametros=$("#frmNuevoUsuario").serialize();
	

	 $.ajax({
	        url: SiteUrl + "/Usuario/actualizarUsuario",
	        dataType: 'html',
	        data: parametros+'&idUsuario='+idUsuario,
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
