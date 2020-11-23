function llenarTablaListaPaquetes(data)
{
  //console.log("data");
  //console.log(data);
  var costoTotal = 0.0;

  $('#tablaListaPaquetes').html('');
  $('#tablaListaPaquetes').append(
    '<thead>'+          
      '<th>Descripción del paquete</th>'+
      '<th>Cantidad</th>'+
      '<th style="text-align:right">Costo</th>'+
      '<th>Quitar</th>'+
    '</thead>');
  $.each(data, function( index, paquete ) {      
      $('#tablaListaPaquetes').append(
        '<tr>'+
          '<td>'+paquete.paqDescripcion+'</td>'+
          '<td>'+paquete.paqCant+'</td>'+
          '<td style="text-align:right">$ '+financial(paquete.paqCosto)+'</td>'+
          '<td>'+
            '<button type="button" id="quitarPaquete'+paquete.paqId+'" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar">'+
              '<i class="ri-eraser-fill"></i>'+
            '</button></td>'+ 
          '</td>'+
        '</tr>');
      costoTotal+=parseFloat(paquete.paqCosto);
  });
  $('#tablaListaPaquetes').append(
    '<thead>'+          
      '<td><b>Total</b></td>'+
      '<td></td>'+
      '<td style="text-align:right"><b>$ '+financial(costoTotal)+'</b></td>'+
      '<td>'+           
    '</thead>');
  $("[id^='quitarPaquete']").click(function(e){
    const btn = e.currentTarget;
    const id = btn.id.replace('quitarPaquete','');
    btn.closest('tr').remove();
    data = data.filter( el => el.paqId !== parseInt(id, 10) );
    listaPaquetes = data;
    $('#envListaPaquetes').val(JSON.stringify(listaPaquetes));
    $('#envCosto').val(costoTotal);
    llenarTablaListaPaquetes(data);
  });  
  $('#envCosto').val(costoTotal);
}
