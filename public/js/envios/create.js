$(document).ready(function() {
	//se esconde el formulario de registro de direcciones
	$('#dirOrigenRegister').hide();
	$('#dirOrigenSeleccion').hide();

    $('#listCantidadPaq').keyup(function(){
		var cant = $('#listCantidadPaq').val();
		envCosto = carCosto*cant;
		$('#envCosto').val(envCosto);
	});
	$('#listCantidadPaq').change(function(){
		var cant = $('#listCantidadPaq').val();
		envCosto = carCosto*cant;
		$('#envCosto').val(envCosto);
	});
	//botón de envío de formulario
	$('#btnRegistrar').click(function(){
		if($('#dirOrigenRegistrar').is(':checked')){		
	        //quita inputs
	        // $('#comNombre').remove();			
	    }
	});
	$('#btnShowOrigenRegistrar').click(function(){
		console.log("btnShowOrigenRegistrar");
		$('#dirOrigenRegister').fadeIn('slow');
		$('#dirOrigenSeleccion').hide();
	});
	$('#btnShowOrigenSeleccionar').click(function(){
		console.log("dirOrigenRegistrada");
		$('#dirOrigenSeleccion').fadeIn('slow');
		$('#dirOrigenRegister').hide();
	});
});