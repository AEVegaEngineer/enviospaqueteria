$('[id^=paqueteDeEnvio]').click(function(){
  const idpaquete = $(this).attr('id').replace("paqueteDeEnvio", "");
  const getPaquetes = "/listapaquete/"+idpaquete;
  const getDetalles = "/envio/"+idpaquete;
  $('#tablaListaPaquetes').html('');
  $('#dirOrigen').text('');
  $('#dirDestino').text('');
  getJson(getPaquetes, null, null, popularModalDetalles);  
  //{{$origen->dirLinea1}}, {{$origen->dirLinea2}}, {{$origen->dirCiudad}}, {{$origen->dirProvincia}}, {{$origen->dirDepartamento}}, {{$origen->dirZip}}
  function popularModalDetalles(data){
  	$.each(data[0], function( index, direccion ) {
  		if(direccion.dirOrigenDestino == 'origen')
  			$('#dirOrigen').text(direccion.dirLinea1+", "+direccion.dirLinea2+", "+direccion.dirCiudad+", "+direccion.dirProvincia+", "+direccion.dirDepartamento+", "+direccion.dirZip);
  		else
  			$('#dirDestino').text(direccion.dirLinea1+", "+direccion.dirLinea2+", "+direccion.dirCiudad+", "+direccion.dirProvincia+", "+direccion.dirDepartamento+", "+direccion.dirZip);
  	});
  	
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
    $.each(data[1], function( index, paquete ) {
      
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
    $('#tablaEnvios').DataTable({
      "bPaginate": false,
      "bLengthChange": false,
      "bInfo": false,
      "bAutoWidth": false,
      "bFilter": false,
      "bFilter": false,
      "language": {
            "lengthMenu": "Mostrando _MENU_ lineas por lista",
            "zeroRecords": "No se han encontrado datos",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos disponibles",
            "infoFiltered": "(filtrado de _MAX_ datos totales)",
            "paginate": {
              "previous": "Anterior",
              "next": "Siguiente",
            }
        }
    });

} );