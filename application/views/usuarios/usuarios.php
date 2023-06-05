<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">

	<div class="col-lg-12 text-center">
		
		<h2><strong>Usuarios del Sistema</strong></h2>

	</div>

</div>

<div class="row">
	<div class="col-md-2">

	</div>

	<div class="col-md-8 ">

	
			<a class="btn btn-primary" href="<?php echo site_url("usuario/solicitaRegistro")?>"><i class="fas fa-user"></i> Agregar usuario </a>
			<br/>
			<br/>
			<table class="table table-hover table-striped table-bordered table-sm table-responsive " id="tablaUsuarios">
				<thead class="thead-dark text-center" >
					<tr>
						<th>IDUSUARIO</th>
						<th>NOMBRE</th>
						<th>PATERNO</th>
						<th>MATERNO</th>
						<th>CORREO</th>
						<!-- <th>USUARIO</th> -->
						<!-- <th>ES ADMIN</th> -->
						<th>ES ACTIVO</th>
						<th>OPERACIONES</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="8"></th>
					</tr>
					
				</tfoot>
				<tbody>


					<?php 

						foreach ($resultados as $regUser) {
							echo "<tr>";
							echo "<td>" . $regUser->idUsuario . "</td>";
							echo "<td>" . $regUser->sNombre . "</td>";
							echo "<td>" . $regUser->sPaterno . "</td>";
							echo "<td>" . $regUser->sMaterno . "</td>";
							echo "<td>" . $regUser->sCorreo . "</td>";
							// echo "<td>" . $regUser->sUsuario . "</td>";
							// echo "<td>" . ($regUser->bEsAdmin=="1"? "SI":"NO") . "</td>";
							echo "<td>" . ($regUser->bActivo=="1"?"SI":"NO") . "</td>";
							echo "<td>";
		 // echo "<div class='dropdown'><button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
		 //    Acciones
		 //  </button>
		 //  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
		 //    <a class='dropdown-item' href='#'>Editar</a> 
		 //  </div></div>";

echo "<a class='btn btn-primary btn-sm' type='button' id='editar' aria-expanded='false' href='".site_url(). '/Usuario/solicitaEditarUsuario/'. $regUser->idUsuario ."'>
		   <i class='fas fa-user-edit'></i>  Editar
		  </a>";

echo "<a class='btn btn-warning btn-sm' type='button' id='cambiarClave' aria-expanded='false' href='".site_url(). '/Usuario/cambiarClave/'. $regUser->idUsuario ."'>
		   <i class='fas fa-key'></i> Cambiar Password
		  </a>";



							echo "</td>";
							echo "</tr>";
						}

					?>


				</tbody>


			</table>

	</div>


	<div class="col-md-2">

	</div>



</div>

<script type="text/javascript">
	
var rutaIdioma="<?php echo base_url()."plugins/datatables/es-mx.json"; ?>";
	
$(document).ready( function () {


    $('#tablaUsuarios').DataTable({
    	"language": {
	    "url": rutaIdioma
    	}

    });

} );


</script>
