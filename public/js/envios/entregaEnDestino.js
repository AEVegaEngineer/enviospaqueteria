var Servidor = "http://localhost:8000";
$('[id^=btnEntregar]').click(function(){
  var idenvio = $(this).attr('id').replace("btnEntregar", "");
  $('#modalDetallesEnvId').val(idenvio);
  var url = Servidor+"envio/enviar";	  
  //getJson(url, null, null, popularTablaListaPaquetes); 
  $('#modalDetallesEntrega').modal('show');
  //sendJson(url, parametros, null, null);
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
$('#btnCompletarEntrega').click(function(e){
	e.preventDeault();
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
	    setTimeout(function () {
	    	$('#formFinalizarEntrega').submit();
	  	},1500);
	  } 
	});
});
/*
$('[id^=btnImprimirComprobanteEntrega]').click(function(){
	var url = Servidor+"/envio/comprobanteEntrega";
	var idenvio = $(this).attr('id').replace("btnImprimirComprobanteEntrega", "");	
	var parametros = {"idenvio":idenvio};
	sendJson(url, parametros, null, null);
	$(this).removeClass('btn-danger').addClass('btn-secondary');
});
*/