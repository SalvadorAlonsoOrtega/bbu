function cerrarSesion(){
var respuesta=0;
        request=$.ajax({
               url: SiteUrl+'/Usuario/cerrarSesion/',       
               dataType: 'json',
               data: '',
               method:'POST',
               async: true
            });

            request.done(function(datos){

              if(datos.Exito==1){
                respuesta=1;

              }else{
                respuesta=0;
               
              }

            });
  return respuesta;     
}

function  solicitaCerrarSesion(){
    if (window.confirm("Confirma cierre de sesión")) {
          var respuesta=cerrarSesion();
             window.location=SiteUrl;            
    }

}

function  mostrarCatalogo(idCatalogo){

            request=$.ajax({
               url: SiteUrl+'/Catalogos/ojos/',       
               dataType: 'html',
               data: '',
               method:'POST',
               async: true
            });

            request.done(function(datos){
              $("#contenido").html(datos);
              console.log("acabó");
              console.log(datos);
            });
  
console.log("ok");

}