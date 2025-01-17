var Servidor = "/";
$('[id^=btnEntregar]').click(function(){
  var idenvio = $(this).attr('id').replace("btnEntregar", "");
  $('#modalDetallesEnvId').val(idenvio);
  var url = Servidor+"envio/enviar";	  
  //getJson(url, null, null, popularTablaListaPaquetes); 
  $('#modalDetallesEntrega').modal('show');
  //sendJson(url, parametros, null, null);
});
$('[id^=btnStatusUpdate]').click(function(e){
	e.preventDefault();
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
	    $('#preloader').fadeIn('fast');
	    formId.submit();
	  } 
	});
});
$('[id^=btnImprimirComprobante]').click(function(){
	var url = "/envio/comprobanteImpreso";
	var idenvio = $(this).attr('id').replace("btnImprimirComprobante", "");	
	var parametros = {"idenvio":idenvio};
	sendJson(url, parametros, null, null);
	$(this).removeClass('btn-danger').addClass('btn-secondary');
});
$('#btnCompletarEntrega').click(function(e){
	console.log('ejecutando');
	e.preventDefault();
	swal({
	  title: "Confirmación Requerida",
	  text: "¿Desea efectuar la entrega de este envío?",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    swal("Envio Entregado!", {
	      icon: "success",
	    });
	    $('#formFinalizarEntrega').submit();
	  } 
	});
});
