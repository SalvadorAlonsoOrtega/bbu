<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="row">

        <div class="col-lg-12 text-center">
            
            <h2><strong>Nuevo Personal</strong></h2>

        </div>

    </div>
</div>


<div class="container">
        <div class="row">
            <!-- <div class="col-md-1">

            </div> -->

            <div class="col-lg-12">
          

                            <form id="frmAgregarPersona" action="" method="post">
                                <fieldset class="form-group border p-3">
                                    <legend><strong>Datos de la persona</strong></legend>
                                <div class="form-row">
                                    <div class="form-group col-lg-6"> 

                                        

                                                                           
                                        <label for="nombre"> Nombre </label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholders="Nombre(s)" > 
                                        
                                        <label for="paterno"> Apellido Paterno </label>
                                        <input type="text" class="form-control" id="paterno" name="paterno" placeholders="Apellido Paterno" > 
                                        
                                        <label for="materno"> Apellido Materno </label>
                                        <input type="text" class="form-control" id="materno" name="materno" placeholders="Apellido Materno" > 



                                    </div>

                                    <div class="form-group col-lg-6"> 

                                        <label for="curp"> CURP </label>
                                        <input type="text" class="form-control" id="curp" name="curp" placeholders="Cláve Única de Registro de Población" > 
                                        <label for="puesto">Puesto</label>
                                        <select class="form-control" id="puesto" name="puesto">
                                            <option value="" selected disabled hidden>[Seleccione]</option>
                                        <?php 
                                        foreach ($puestos as $puesto) {
                                            echo "<option value='". $puesto->idPuesto ."'>" . $puesto->sPuesto . "</option>";
                                        }
                                        ?>
                                        </select>
                                        


                                    </div>                                    


                                </div>
                                
                                                              
                                <div class="form-row">
                                
                                    <div class="form-group col-lg-12 text-right">
                                        <button type="button" class="btn btn-danger" onClick="mostrarPersonal()">Cancelar </button>
                                        <button type="button" class="btn btn-primary" onClick="guardarPersona()">Guardar</button>
                                    <?php
                                    
                                    
                                    ?>
                                    </div>

                                
                                </div>
                                </fieldset>

                            </form>

             </div> <!-- fin de div ancho 10  -->


            <!-- <div class="col-md-1">
            
            </div> -->
        </div> <!-- fin de row -->
</div> <!-- fin de container -->





<script type="text/javascript">
	
var rutaIdioma="<?php echo base_url()."plugins/datatables/es-mx.json"; ?>";
	
$(document).ready( function () {
   




} );





function mostrarPersonal(){
    window.location.href = SiteUrl + "<?php echo "/Personal/verPersonal"; ?>";
}

function guardarPersona(){

    datos=$("#frmAgregarPersona").serialize();

    $.ajax({
        url: SiteUrl + "/Personal/guardarPersona",
        dataType: 'html',
        data:datos,
        method: 'post'
    })
    .done(function (html) {


           html=JSON.parse(html);
	    	if (html.error==true){
	        	swal.fire("Error al guardar persona", html.mensaje, "error");      

	    	}else{
                swal.fire("Registro de personal almacenado con éxito!"
                            ,"",
                            "success").then(function() {

                                            mostrarPersonal();
                                            });
            }
           
  
    });


}

</script>