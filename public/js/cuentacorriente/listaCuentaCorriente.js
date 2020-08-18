
$('select#shopId option:first').attr('disabled', true); 
if (priv == 3){
  consultarCtaCte()
}


function consultarCtaCte(){
  const getCuentaCorriente = Servidor+"/cuentacorriente/obtener";
  //console.log(getCuentaCorriente);
  const params = {
    "userid":userid,
    "desde":$('#desde').val(),
    "hasta":$('#hasta').val()
  }
  const data = sendJson(getCuentaCorriente, params, null, llenarTablaCuentaCorriente); 
  
  
}
function llenarTablaCuentaCorriente(data)
{
  var costoTotal = 0.0;
  console.log(data);
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
      '<td>Total</td>'+
      '<td></td>'+
      '<td></td>'+
      '<td>$ '+costoTotal.toFixed(2)+'</td>'+
      '<td></td>'+
    '</thead>');
  $('#tablaCuentaCorriente').DataTable();
}
$(document).ready(function() {
  
  $('#shopId, #desde, #hasta').change(function(){
    if($('#desde').val() != "" && $('#hasta').val() != "" && $('#shopId').children("option:selected").val() != "0")
    {
      console.log("condiciones cumplidas");
      if (priv == 4 || priv == 5 ){
        consultarCtaCte();
      }
    }
    
  });
});



