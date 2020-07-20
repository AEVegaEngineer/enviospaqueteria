var Servidor = "http://localhost:8000/";

$('[id^=paqueteDeEnvio]').click(function(){
  var idpaquete = $(this).attr('id').replace("paqueteDeEnvio", "");
  var url = Servidor+"/listapaquete/"+idpaquete;
  $('#tablaListaPaquetes').html('');
  getJson(url, null, null, popularTablaListaPaquetes);
  
  function popularTablaListaPaquetes(listapaquete){
    $('#tablaListaPaquetes').append(
        '<thead>'+          
          '<th>Descripción</th>'+
          '<th>Cantidad</th>'+
          '<th>Alto</th>'+
          '<th>Ancho</th>'+
          '<th>Largo</th>'+
          '<th>Peso</th>'+
        '</thead>');
    var divisorUnidades = 1;
    var divisorPeso = 1;
    var totalVolumen = 0;
    var totalPeso = 0;
    $.each(listapaquete, function( index, paquete ) {
      
      $('#tablaListaPaquetes').append(
        '<tr>'+
          '<td>'+paquete.paqDescripcion+'</td>'+
          '<td>'+paquete.listCantidadPaq+'</td>'+
          '<td>'+paquete.paqDimensionAlto+' '+paquete.paqDimensionUnidad+'</td>'+
          '<td>'+paquete.paqDimensionAncho+' '+paquete.paqDimensionUnidad+'</td>'+
          '<td>'+paquete.paqDimensionLargo+' '+paquete.paqDimensionUnidad+'</td>'+
          '<td>'+paquete.paqPeso+' '+paquete.paqPesoUnidad+'</td>'+
        '</tr>');
      if(paquete.paqDimensionUnidad == "Centímetros")
        divisorUnidades = 100;
      if(paquete.paqPesoUnidad == "Gramos")
        divisorUnidades = 1000;
      var alto = paquete.paqDimensionAlto / divisorUnidades;
      var ancho = paquete.paqDimensionAncho / divisorUnidades;
      var largo = paquete.paqDimensionLargo / divisorUnidades;
      var volumen = alto*ancho*largo;
      var volumenEnCm = volumen*100;

      totalPeso += paquete.paqPeso / divisorPeso * paquete.listCantidadPaq;

      if(paquete.paqDimensionUnidad == "Centímetros")
        totalVolumen += (volumenEnCm/100) * paquete.listCantidadPaq;
      else
        totalVolumen += volumen * paquete.listCantidadPaq;
    });
    $('#spanVolumenTotal').text(parseFloat(totalVolumen).toFixed(2)+ " m\u00b3");
    $('#spanPesoTotal').text(parseFloat(totalPeso).toFixed(2)+ " Kg");

    $('#modalListaPaquetes').modal('show');
  }
  
});
function beforeObtenerListaPaquetes(){

}
function successObtenerListaPaquetes(){

}

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
      $('#preloaderConsultas').delay(100).fadeIn('fast');
    },
    success: function (response)
    {
      $('#preloaderConsultas').delay(100).fadeOut('fast');
      setTimeout(function() {
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
      console.log(xhr);
    }
  });
}
function sendJson(url, parametros, loadingScrn, callback){
  $.ajax({
    async: true,
    crossDomain: true,
    datatype: "json",
    data: parametros,
    url: url,
    type: "POST",
    headers: {
      "Cache-Control": "no-cache",
      'X-CSRF-TOKEN': $('#_token').val()      
    },
    beforeSend: function () {
      if(loadingScrn != null)
        $('#preloaderConsultas').delay(100).fadeIn('fast');
    },
    success: function (response)
    {
      $('#preloaderConsultas').delay(100).fadeOut('fast');
      setTimeout(function() {
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
      console.log(xhr);
      //console.log("Servidor no responde");
    }
  });
}