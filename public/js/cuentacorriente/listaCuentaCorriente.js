
$('select#shopId option:first').attr('disabled', true); 

function consultarCtaCte(useridConsultar){
  const getCuentaCorriente = "/cuentacorriente/obtener";
  const params = {
    "userid":useridConsultar,
    "desde":$('#desde').val(),
    "hasta":$('#hasta').val()
  }
  console.log(params)
  const data = sendJson(getCuentaCorriente, params, null, llenarTablaCuentaCorriente); 
  
  
}
function llenarTablaCuentaCorriente(data)
{
  console.log("data");
  console.log(data);
  var costoTotal = 0.0;

  $('#tablaCuentaCorriente').html('');
  $('#tablaCuentaCorriente').append(
    '<thead>'+          
      '<th>Código</th>'+
      '<th>Remitente</th>'+
      '<th>Fecha de Registro</th>'+
      '<th>Costo</th>'+
      '<th>Fecha de Recibido</th>'+
    '</thead>');
  $.each(data, function( index, envio ) {      
      $('#tablaCuentaCorriente').append(
        '<tr>'+
          '<td>'+envio.envCodigo+'</td>'+
          '<td>'+envio.comNombre+'</td>'+
          '<td>'+formatearFecha(envio.created_at)+'</td>'+
          '<td>$ '+envio.envCosto+'</td>'+
          '<td>'+formatearFecha(envio.envEntregadoEn)+'</td>'+
        '</tr>');
      costoTotal+=parseFloat(envio.envCosto);
  });
  $('#tablaCuentaCorriente').append(
    '<thead>'+          
      '<td><b>Total</b></td>'+
      '<td></td>'+
      '<td></td>'+
      '<td><b>$ '+costoTotal.toFixed(2)+'</b></td>'+
      '<td></td>'+
    '</thead>');
  //si la tabla ya existe la reconstruye
  /*
  rebuildTables('tablaCuentaCorriente');  
  $('#tablaCuentaCorriente').DataTable({
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
  */
}

$('#shopId, #desde, #hasta').change(function(){
  if( priv == 4 || priv == 5)
  {    
    useridConsultar = $('#shopId').children("option:selected").val();
    if($('#desde').val() != "" && $('#hasta').val() != "" && $('#shopId').children("option:selected").val() != "0")
    {

      if (priv == 3 || priv == 4 || priv == 5 ){
        consultarCtaCte(useridConsultar);
      }
    }
  }  
  else
  {
    if($('#desde').val() != "" && $('#hasta').val() != "")
    {
      if (priv == 3 || priv == 4 || priv == 5 ){
        consultarCtaCte(userid);
      }
    }
  }
});




