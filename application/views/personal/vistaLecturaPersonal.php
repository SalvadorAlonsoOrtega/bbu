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
          

                            <form id="frmVerPersonal" action="#" method="post">
                                <fieldset class="form-group border p-3">
                                    <legend><strong>Datos de la persona</strong></legend>
                                <div class="form-row">
                                    <div class="form-group col-lg-6"> 
                                    <label for="nombre"> Nombre </label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholders="Nombre(s)" value="<?php echo $datosPersonales[0]->sNombre?>" readonly> 
                                        
                                        <label for="paterno"> Apellido Paterno </label>
                                        <input type="text" class="form-control" id="paterno" name="paterno" placeholders="Apellido Paterno" value="<?php echo $datosPersonales[0]->sPaterno?>" readonly> 
                                        
                                        <label for="materno"> Apellido Materno </label>
                                        <input type="text" class="form-control" id="materno" name="materno" placeholders="Apellido Materno" value="<?php echo $datosPersonales[0]->sMaterno?>" readonly> 
                                       
                                    </div>

                                    <div class="form-group col-lg-6"> 
                                        <label for="curp"> CURP </label>
                                        <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $datosPersonales[0]->sCURP?>" readonly> 
                                        
                                        <label for="puesto">Puesto</label>
                                        <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $datosPersonales[0]->sPuesto?>" readonly> 
                                    
                                        
                                    </div>                                    




                                </div>
                                
                               


                                

                                </fieldset>

                            </form>

             </div> <!-- fin de div ancho 10  -->


            <!-- <div class="col-md-1">
            
            </div> -->
        </div> <!-- fin de row -->
</div> <!-- fin de container -->