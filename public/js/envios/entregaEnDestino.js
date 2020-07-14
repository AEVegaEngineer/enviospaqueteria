$('[id^=btnEntregar]').click(function(){
  var idenvio = $(this).attr('id').replace("btnEntregar", "");
  var url = Servidor+"enviar/"+idenvio;	  
  //getJson(url, null, null, popularTablaListaPaquetes); 
  console.log(url)
  $('#modalDetallesEntrega').modal('show');
});