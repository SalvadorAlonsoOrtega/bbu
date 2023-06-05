<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<?php 


if ((isset($_SESSION['User']))){
      header('Location: '.site_url().'/Principal');

      die();
      
    }

?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Administrativo</title>



<?php 
  include ("recursos/recursos-cabeza.php");
  
?>
    

</head>
<body >

<div id="cuerpo" >
   

    <!-- fila de imagen -->
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 text-center">
        <!-- <img src="<?php echo base_url('img/eIpS2SLP_400x400.jpg'); ?>" width="80%"  alt=""/> -->
      </div>
      <div class="col-sm-4"></div>
    </div>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 text-center">
        <!-- <span class="h1"><strong>ALBATROS</strong></span><br> -->
        <span class="h3">Sistema Administrativo</span>
      </div>
      <div class="col-sm-4"></div>
    </div>     
<br>

      
     <!-- fila de formulario -->

     <div class="col-sm-4"></div>
    <div id="Box" class="container col-sm-4">
      <form name="formLogin" id="formLogin" method="post">
        <div class="form-group"><input name="user" type="text" autofocus class="form-control validate[required]" placeholder="Usuario"></div>
        <div class="form-group"><input class="form-control validate[required]" placeholder="Contraseña" name="password" type="password" onkeypress="Enter(event);"></div>
  
        <div class="form-group"><div class="btn btn-lg btn-success btn-block" onClick="IniciarSesion();">Iniciar sesión &nbsp;&nbsp;<span class="fa fa-sign-in"></span></div></div>
      </form>
      
    </div>  

    <div class="col-sm-4"></div>
    <!-- fila de formulario -->
    <div class="row"> 
      <div class="col-sm-4"></div>
      <div class="col-sm-4 text-center">
        <!-- <span> ¿Olvidaste tu contraseña? </span> <a href="#" > Recupérala aqui</a> -->
      </div>
      <div class="col-sm-4"></div>
    </div> 


<?php 
  include ("recursos/recursos-pie.php");
  
?>

<script type="text/javascript">


 
  
    function IniciarSesion(){

    var SiteUrl="<?php echo site_url();?>";

    //console.log(SiteUrl);
    //return 0;


    $("#formLogin").validationEngine({scroll: false});
    var validacion=$('#formLogin').validationEngine('validate');
    if(validacion==true){
      var Parameters=$("#formLogin").serialize();
        



          request=$.ajax({
             url: SiteUrl+'/Usuario/iniciarSesion/',       
             dataType: 'json',
             data: Parameters,
             method:'POST',
             async: true
          });

          request.done(function(datos){
            
            
            if(datos.Exito==1){
              console.log(SiteUrl +'/Principal/');
              window.location=SiteUrl +'/Principal/';
            }else{
              swal.fire("Error!", "Usuario o contraseña incorrecto", "error");
            }

          });

    }
  } 

  function Enter(e){
    var tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){ 
      IniciarSesion(); 
    };    
  }


</script>


</body>

</html>

