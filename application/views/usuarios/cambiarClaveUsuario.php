<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="row">

	<div class="col-lg-12 text-center">
		
		<h2><strong>Cambiar password (clave) de usuario</strong></h2>

	</div>

</div>

<div class="row">
	<div class="col-md-2">

	</div>

	<div class="col-md-8 ">

	
			<form id="frmNuevoUsuario">

			   <div class="form-group">
			    <label for="clave">CLAVE</label>
			    <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
			  </div>

			  <div class="form-group">
			    <label for="clave2">REPETIR CLAVE</label>
			    <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repetir contraseña">
			  </div>


			  <a  class="btn btn-danger" href="<?php echo site_url("usuario/usuarios")?>">Regresar</a>
			  <button type="button" class="btn btn-success" onclick="cambiarClave()">Guardar cambios</button>
			  
			</form>
		

	</div>


	<div class="col-md-2">

	</div>



</div>

<script type="text/javascript">

function cambiarClave(){

	if ($("#clave").val()!=$("#clave2").val()){
		alert("las claves no son identicas");
		return 0;
	}


	idUsuario=<?php echo $idUsuario; ?>;
	
	parametros=$("#clave").serialize();
	

	 $.ajax({
	        url: SiteUrl + "/Usuario/actualizarClaveUsuario",
	        dataType: 'html',
	        data: parametros+'&idUsuario='+idUsuario,
	        method: 'post'
	    })
	    .done(function (html) {

	    	html=JSON.parse(html);
	    	if (html.error==true){
	        	swal.fire("Error al actualizar password de usuario", html.mensaje, "error");      
	    	}else{

				swal.fire("Actualización de usuario", "password actualizado con éxito" , "success");      
	    	}

	    	
	        
	    });
	

}



</script>
