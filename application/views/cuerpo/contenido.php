<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--   ##################### -->
  
<!--   ##################### -->
  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          
          <div class="col-sm-12">
            
            <h1 class="m-0" id="tituloPantalla" style="text-align: center;">Sistema Administrativo</h1>
            <h2 class="m-0" id="subtituloPantalla"></h2>
          </div><!-- /.col -->
          
        </div><!-- /.row -->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid" id="contenedor">



          <div class="row">
            <div class="col-lg-12">

              <div id="contenido">


                

                <?php

                if (isset($mostrarImagen)) {
                ?>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10 text-center">
                            <!-- <img src="<?php echo base_url()?>/img/eIpS2SLP_400x400.jpg" width="60%"> -->
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                <?php 
                }
// CONTENIDO                
                if (isset($personal)){
                  echo $personal;

                }
                if (isset($nuevoPersonal)){
                  echo $nuevoPersonal;

                }
                

                ?>


              </div>


            </div>

          </div>


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
<!--   ##################### -->
  
<!--   ##################### -->