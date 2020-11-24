
function obtenerDimensionesMetricas(dimensiones, dimensionUnidad){
  let dimensionesMetricas = 0;
  switch(dimensionUnidad){
    case 'cm':
      dimensionesMetricas = dimensiones / 1000000;
      break;
    case 'm':
      dimensionesMetricas = dimensiones;
      break;
    case 'mm':
      dimensionesMetricas = dimensiones / 1000000000;
      break;
    case 'in':
      dimensionesMetricas = dimensiones / 61024;
      break;
    default:
      dimensionesMetricas = 0;
      break;
  }
  return dimensionesMetricas;
}

function obtenerPesoEnKg(peso, pesoUnidad){
  let pesoEnKg = 0.0;
  switch(pesoUnidad){
    case 'mg':
      pesoEnKg = (peso / 1000000);
      break;
    case 'gr':
      pesoEnKg = (peso / 1000);
      break;
    case 'oz':
      pesoEnKg = (peso / 35.27);
      break;
    case 'kg':
      pesoEnKg = peso;
      break;
    case 'lb':
      pesoEnKg = (peso / 2.2);
      break;
    case 't':
      pesoEnKg = (peso / 0.001);
      break;
    default:
      pesoEnKg = 0;
      break;
  }
  return pesoEnKg;
}

$('[id^=paqueteDeEnvio]').click(function(){
  $(this).prop('tooltipText', 'Comprobantes impresos');
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
          '<th>Volumen</th>'+
          '<th>Peso</th>'+
        '</thead>');
    var divisorUnidades = 1;
    var divisorPeso = 1;
    var totalVolumen = 0;
    var totalPeso = 0;
    $.each(data[1], function( index, paquete ) {
      var alto = paquete.paqDimensionAlto / divisorUnidades;
      var ancho = paquete.paqDimensionAncho / divisorUnidades;
      var largo = paquete.paqDimensionLargo / divisorUnidades;
      var volumen = alto*ancho*largo;
      const volumenPorPaquetes = obtenerDimensionesMetricas(volumen, paquete.paqDimensionUnidad) * paquete.listCantidadPaq;
      const pesoPorPaquetes = paquete.paqPeso * paquete.listCantidadPaq;
      $('#tablaListaPaquetes').append(
        '<tr>'+
          '<td>'+paquete.paqDescripcion+'</td>'+
          '<td>'+paquete.listCantidadPaq+'</td>'+
          '<td>'+dimensionFormat(volumenPorPaquetes)+" m\u00b3"+'</td>'+
          '<td>'+peso(pesoPorPaquetes)+' '+paquete.paqPesoUnidad+'</td>'+
        '</tr>');
      if(paquete.paqDimensionUnidad == "Centímetros")
        divisorUnidades = 100;
      if(paquete.paqPesoUnidad == "Gramos")
        divisorUnidades = 1000;
      
      

      var volumenEnCm = volumen*100;

      totalPeso += obtenerPesoEnKg(paquete.paqPeso, paquete.paqPesoUnidad) * paquete.listCantidadPaq;

      totalVolumen += volumenPorPaquetes;


    });
    $('#spanVolumenTotal').text(parseFloat(totalVolumen).toFixed(2)+ " m\u00b3");
    $('#spanPesoTotal').text(parseFloat(totalPeso).toFixed(2)+ " Kg");

    $('#modalListaPaquetes').modal('show');
  }
  
});

$(document).ready( function () {
  $.fn.dataTable.moment('dd-MM-YYYY HH:mm:ss');
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
    },
    "columnDefs": [
      {
        targets: [1],
        data: "date",
        render: function(data, type, full, meta){
          if(type === "display"){
            data = moment(data.replace(" ","T")).format("DD-MM-YYYY hh:mm:ss"); 
          }
          return data;
        }
      } 
    ]
  });
} );