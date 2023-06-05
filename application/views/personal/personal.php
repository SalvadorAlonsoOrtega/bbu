<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">

	<div class="col-lg-12 text-center">
		
		<h2><strong>Personal</strong></h2>

	</div>

</div>

<div class="row">
	<div class="col-md-1">

	</div>

	<div class="col-md-10">

	<?php

	
	?>
			<a class="btn btn-primary" href="<?php echo site_url("Personal/agregarPersona")?>"><i class="fas fa-user-plus"></i> Nuevo registro </a>
			<br/>
			<br/>
			
			<table class="table table-hover table-striped table-bordered table-sm table-responsive " id="tablaPersonal">
				<thead class="thead-dark text-center" >
					<tr>
						<th>ID Personal</th>
						<th>Nombre</th>
						<th>Paterno</th>
						<th>Materno</th>
						<th>Puesto</th>
						<th>CURP</th>
						<th>Operaciones</th>

					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="7"></th>
					</tr>
					
				</tfoot>
				<tbody>


					<?php
                    
						foreach ($personal as $persona) {
							echo "<tr id='".$persona->idPersonal."'>";
							echo "<td class='personal'>" . str_pad($persona->idPersonal, 7,"0", STR_PAD_LEFT)  . "</td>";

							echo "<td>" . $persona->sNombre  . "</td>";
                            echo "<td>" . $persona->sPaterno  . "</td>";
                            echo "<td>" . $persona->sMaterno  . "</td>";
                           							
							echo "<td>" . $persona->sPuesto  . "</td>";
							echo "<td>" . $persona->sCURP . "</td>";

						
                            echo "<td>";
                            echo "<button id='".$persona->idPersonal."' class='btn btn-primary verPersona'><span class='fas fa-eye'></button>";
                            echo "<button class='btn btn-warning'><span class='fas fa-edit'></button>";
                            echo "<button class='btn btn-danger'><span class='fas fa-trash'></span></button>";
                            echo "</td>";
														
							echo "</tr>";
						}

					?>




				</tbody>


			</table>

<!-- Iniio de Ventana modal para visualizar egresos -->
	<div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="tituloModal"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="contenidoModal">
              <!-- contenido -->
            </div>
            <div class="modal-footer justify-content-right">
			  <!-- <button type="button" class="btn btn-primary" > <span class="fa fa-print"></span> Imprimir</button> -->
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- pie del modal -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- Fin de Ventana modal para visualizar y modificar redcibos -->


	</div>


	<div class="col-md-1">

	</div>
</div>

<!-- Iniio de Ventana modal para visualizar y modificar  -->
<div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="tituloModal"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="contenidoModal">
              <!-- contenido -->
            </div>
            <div class="modal-footer justify-content-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- pie del modal -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- Fin de Ventana modal para visualizar y modificar -->

<script type="text/javascript">

$(".verPersona").on("click", function(){

    let idPersona=$(this).prop("id");
    $.ajax({
            url: SiteUrl + "/Personal/consultarPersona",
            dataType: 'html',
            data:'idPersona=' + idPersona,
            method: 'post'
        })
        .done(function (html) {
            html=JSON.parse(html);
                if (html.error==true){
                    respuesta=0;
                    Swal.fire('Error al obtener los datos de la persona',
                                '',
                                'error')
                }else{
                    respuesta=1;
                    
                    $("#tituloModal").html("ID Persona " + idPersona );
                    $("#contenidoModal").html(html.datos);
                    $("#modal-xl").modal("show");
                }
        });

        //return respuesta;

});

// function verDetallePersona(idPersona){

        
        
// }


var rutaIdioma="<?php echo base_url()."plugins/datatables/es-mx.json"; ?>";

$(document).ready( function () {

	// configura datatable
    var tablaPersonal=$('#tablaPersonal').DataTable({

		
    	"language": {
	    "url": rutaIdioma
		
    	},
		"order": [0,'desc'],	
    });

	
		 


} ); // fin de on ready







</script>
