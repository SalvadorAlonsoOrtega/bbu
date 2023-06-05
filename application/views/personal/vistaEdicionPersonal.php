<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 


//print_r($datosPersonales);


?>

<div class="container">
    <div class="row">

        <div class="col-lg-12 text-center">
            
            <h2><strong></strong></h2>

        </div>

    </div>
</div>


<div class="container">
        <div class="row">
            <!-- <div class="col-md-1">

            </div> -->

            <div class="col-lg-12">
          

                            <form id="frmEditarPersonal" action="#" method="post">
                                <fieldset class="form-group border p-3">
                                    <legend><strong>Datos de la persona</strong></legend>
                                <div class="form-row">
                                    <div class="form-group col-lg-6"> 
                                    
                                        <input type="hidden" id="idPersonal" name="idPersonal" value="<?php echo $datosPersonales[0]->idPersonal?>"> 
                                        
                                        <label for="nombre"> Nombre </label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholders="Nombre(s)" value="<?php echo $datosPersonales[0]->sNombre?>"> 
                                        
                                        <label for="paterno"> Apellido Paterno </label>
                                        <input type="text" class="form-control" id="paterno" name="paterno" placeholders="Apellido Paterno" value="<?php echo $datosPersonales[0]->sPaterno?>"> 
                                        
                                        <label for="materno"> Apellido Materno </label>
                                        <input type="text" class="form-control" id="materno" name="materno" placeholders="Apellido Materno" value="<?php echo $datosPersonales[0]->sMaterno?>"> 
                                       
                                    </div>

                                    <div class="form-group col-lg-6"> 
                                        <label for="curp"> CURP </label>
                                        <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $datosPersonales[0]->sCURP?>"> 
                                        
                                        <label for="puesto">Puesto</label>
                                        <!-- <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $datosPersonales[0]->sPuesto?>" readonly>  -->

                                        <select class="form-control" id="puesto" name="puesto">
                                        <?php 
                                        foreach ($puestos as $puesto) {
                                            if ($datosPersonales[0]->idPuesto==$puesto->idPuesto){
                                                $seleccionado=" selected ";
                                            }else{
                                                $seleccionado="";
                                            }
                                            echo "<option value='". $puesto->idPuesto ."' ".$seleccionado.">" . $puesto->sPuesto . "</option>";
                                        }
                                        ?>
                                        </select>

                                    
                                        
                                    </div>                                    




                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12 text-right"> 
                                    <button id="actualizaPersona" type="button" class="btn btn-success" ><span class="fas fa-save"></span>   Actualizar</button>
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

    $("#actualizaPersona").on("click", function(){
    let datosFrm=$("#frmEditarPersonal").serialize();
    $.ajax({
            url: SiteUrl + "/Personal/actualizaPersona",
            dataType: 'html',
            data:datosFrm,
            method: 'post'
        })
        .done(function (html) {
            html=JSON.parse(html);
                if (html.error==true){
                    
                    Swal.fire('Error al actualizar los datos de la persona.',
                                '',
                                'error');
                }else{
                    Swal.fire('Datos de persona actualizados con éxito.',
                                '',
                                'success');
                    $("#modal-xl").modal("hide");
                  
                }
        });
});

</script>