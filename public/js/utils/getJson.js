var Servidor = "http://localhost:8000/";

$('[id^=paqueteDeEnvio]').click(function(){
  var idpaquete = $(this).attr('id').replace("paqueteDeEnvio", "");
  var url = Servidor+"listapaquete/"+idpaquete;
  getJson(url, null, null, popularTablaListaPaquetes)
  //tablaListaPaquetes
  function popularTablaListaPaquetes(listapaquete){
    $.each(listapaquete, function( index, value ) {
      alert( index + ": " + value );
    });
  }
  $('#modalListaPaquetes').modal('show');
});

function getJson(url, parametros, loadingScrn, callback){
  $.ajax({
    async: true,
    crossDomain: true,
    datatype: "json",
    data: parametros,
    url: url,
    type: "GET",
    headers: {
      "Cache-Control": "no-cache"
    },
    beforeSend: function () {
      /*
      if(loadingScrn==true){
        $('#loadingMsg').html("<br>Iniciado: " + moment().format('DD/MM/YYYY HH:mm:ss'));
        $("#modalProcessing").modal("show");
        $(".modal-backdrop").css("z-index", "1050");
        $("#modalProcessing").css("z-index","1051");
      }
      */
    },
    success: function (response)
    {
      setTimeout(function() {
        /*
        if(loadingScrn==true){
          $('#loadingMsg').html("");
          $(".modal-backdrop").css("z-index", "1040");
          $("#modalProcessing").modal("hide");
        }
        */
        if (response) {
            var a=JSON.stringify(response);
            var resultado=JSON.parse(a); 
            if(callback && callback!=""){
              try{
                callback(resultado);
              }
              catch(err){
                console.log(err.message);
              }
            }
            else{
              console.log(resultado);
            }
        }
      }, 300);
    },
    error: function(xhr) { // if error ocurre
      console.log("Servidor no responde");
      /*
        if(loadingScrn==true){
          $('#loadingMsg').html("");
          $("#modalProcessing").modal("hide");
          mostrarMensaje("Conexión al Servidor",servidorPromoXY+" No Responde<br>Opción disponible solo desde la red Interna.","OK");
        }
        */
    }
  });
}