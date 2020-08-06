$('[id^=paqueteDeEnvio]').click(function(){
  const idpaquete = $(this).attr('id').replace("paqueteDeEnvio", "");
  const getPaquetes = Servidor+"/listapaquete/"+idpaquete;
  const getDetalles = Servidor+"/envio/"+idpaquete;
  $('#tablaListaPaquetes').html('');
  getJson(getPaquetes, null, null, popularTablaListaPaquetes);  
  getJson(getDetalles, null, null, popularModalDetalles);
  function popularModalDetalles(detalles){
  	console.log(detalles);
  }
  //{{$origen->dirLinea1}}, {{$origen->dirLinea2}}, {{$origen->dirCiudad}}, {{$origen->dirProvincia}}, {{$origen->dirDepartamento}}, {{$origen->dirZip}}
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
$(document).ready( function () {
    $('#tablaEnvios').DataTable();

} );