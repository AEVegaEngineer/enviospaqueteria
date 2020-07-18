var Servidor = "http://localhost:8000";
$('[id^=btnEntregar]').click(function(){
  var idenvio = $(this).attr('id').replace("btnEntregar", "");
  
  var url = Servidor+"enviar/"+idenvio;	  
  //getJson(url, null, null, popularTablaListaPaquetes); 
  console.log(url)
  $('#modalDetallesEntrega').modal('show');
});
$('[id^=btnStatusUpdate]').click(function(){
	var formId = $('#estadoUpdateForm');
	var idenvio = $(this).attr('id').replace("btnEntregar", "");
	swal({
	  title: "Confirmación Requerida",
	  text: "¿Desea actualizar el estado de este envío?",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    swal("Envio Actualizado!", {
	      icon: "success",
	    });
	    setTimeout(function () {
	    	formId.submit();
	  	},500);
	  } 
	});
});
$('[id^=btnImprimirComprobante]').click(function(){
	var url = Servidor+"/envio/comprobanteImpreso";
	var idenvio = $(this).attr('id').replace("btnImprimirComprobante", "");	
	var parametros = {"idenvio":idenvio};
	sendJson(url, parametros, null, null);
	$(this).removeClass('btn-danger').addClass('btn-secondary');
});