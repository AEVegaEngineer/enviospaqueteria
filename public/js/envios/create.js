$(document).ready(function() {
    $('#listCantidadPaq').keyup(function(){
		var cant = $('#listCantidadPaq').val();
		envCosto = 100*cant;
		$('#envCosto').val(envCosto);
	});
	$('#listCantidadPaq').change(function(){
		var cant = $('#listCantidadPaq').val();
		envCosto = 100*cant;
		$('#envCosto').val(envCosto);
	});
});