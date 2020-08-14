
$('select#shopId option:first').attr('disabled', true); 
if (priv == 3){
  llenarTablaCtaCorriente(userid)
}


function llenarTablaCtaCorriente(){
  const getCuentaCorriente = Servidor+"/cuentacorriente/obtener";
  //console.log(getCuentaCorriente);
  const params = {
    "userid":userid,
    "desde":$('#desde').val(),
    "hasta":$('#hasta').val()
  }
  const data = sendJson(getCuentaCorriente, params, null, mostrar); 
  
  $('#tablaCuentaCorriente').html('');
  $('#tablaCuentaCorriente').append(
    '<thead>'+          
      '<th>Código</th>'+
      '<th>Comercio</th>'+
      '<th>Fecha de Registro</th>'+
      '<th>Costo</th>'+
      '<th>Fecha de Recibido</th>'+
    '</thead>');
  $('#tablaCuentaCorriente').append(
    '<tr>'+          
      '<td>Código</td>'+
      '<td>Comercio</td>'+
      '<td>Fecha de Registro</td>'+
      '<td>Costo</td>'+
      '<td>Fecha de Recibido</td>'+
    '</tr>');
}
function mostrar(data){console.log(data)}
$(document).ready(function() {
  //$('#tablaEnvios').DataTable();
  $('#shopId').change(function(){
    if (priv == 4 || priv == 5 ){
      llenarTablaCtaCorriente()
    }
  });
});


