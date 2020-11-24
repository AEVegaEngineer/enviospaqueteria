
function mostrarPreloader() {
  $('#preloader').fadeIn('fast')    
}
function calcularCostos(ps,cant){
	const dimensiones = ps.paqDimensionAlto * ps.paqDimensionAncho * ps.paqDimensionLargo;
	let dimensionesMetricas = 0.0;
	switch(ps.paqDimensionUnidad){
		case 'cm':
			dimensionesMetricas = dimensiones / 1000000;
			break;
		case 'm':
			dimensionesMetricas = dimensiones;
			break;
		case 'mm':
			dimensionesMetricas = dimensiones / 1000000000;
			break;
		case 'in':
			dimensionesMetricas = dimensiones / 61024;
			break;
		default:
			dimensionesMetricas = 0;
			break;
	}

	$('#lblVolumen').html(dimensionFormat(dimensionesMetricas * cant).toString()+' m&#179;');
	var costoPorDimension = dimensionesMetricas * costoVolumen * cant;
	$('#lblPeso').html(peso(ps.paqPeso * cant).toString()+" "+ps.paqPesoUnidad);		

	let costoPorKilo = 0.0;
	switch(ps.paqPesoUnidad){
		case 'mg':
			costoPorKilo = costoPeso * (ps.paqPeso / 1000000) * cant;
			break;
		case 'gr':
			costoPorKilo = costoPeso * (ps.paqPeso / 1000) * cant;
			break;
		case 'oz':
			costoPorKilo = costoPeso * (ps.paqPeso / 35.27) * cant;
			break;
		case 'kg':
			costoPorKilo = costoPeso * ps.paqPeso * cant;
			break;
		case 'lb':
			costoPorKilo = costoPeso * (ps.paqPeso / 2.2) * cant;
			break;
		case 't':
			costoPorKilo = costoPeso * (ps.paqPeso / 0.001) * cant;
			break;
		default:
			costoPorKilo = 0;
			break;
	}
	$('#lblCostoVolumen').text("$ "+financial(costoPorDimension));
	$('#lblCostoPeso').text("$ "+financial(costoPorKilo));
	mayorCosto = (costoPorDimension > costoPorKilo) ? costoPorDimension : costoPorKilo;
	$('#lblBaseCalculo').text((costoPorDimension > costoPorKilo) ? "Volumen" : "Peso");	
}
var listaPaquetes = [];
var mayorCosto = 0;
$(document).ready(function() {

	$('#registrarEnvio').hide();
	//console.log("envio/create");
	$('#paqDescripcion').select2();
	console.log("paquetes");
	console.log(paquetes);
	$('#paqDescripcion').on('change',function(e){	
		// si se selecciona el placeholder, no hacer nada	
		if($(this).val() == 0) return;
		const ps = paquetes.find(paquete => paquete.paqId == $(this).val());
		//console.log(ps);
		//mostrando Volumen y peso en los labels
		var cant = $('#listCantidadPaq').val();
		calcularCostos(ps,cant);
		
	});
	
  $('#listCantidadPaq').keyup(function(){
  	if( $('#paqDescripcion').val() == 0 ) return;
		const ps = paquetes.find(paquete => paquete.paqId == $('#paqDescripcion').val());
		var cant = $('#listCantidadPaq').val();
		calcularCostos(ps,cant);
	});
	$('#listCantidadPaq').change(function(){
		if( $('#paqDescripcion').val() == 0 ) return;
		const ps = paquetes.find(paquete => paquete.paqId == $('#paqDescripcion').val());
		var cant = $('#listCantidadPaq').val();
		calcularCostos(ps,cant);
	});
	
	$('#btnAgregarPaquete').click(function(){

		if( $('#paqDescripcion').val() == 0 ) return;

		//validación, si el artículo ya está ingresado no se puede volver a ingresar en la lista
		if( listaPaquetes.find(paquete => paquete.paqId == $('#paqDescripcion').val()) )
		{
			swal("Ha ocurrido un error!", "El paquete ya se encuentra en la lista de envío", "error");
			return;
		}

		$('#registrarEnvio').fadeIn('fast');
		const ps = paquetes.find(paquete => paquete.paqId == $('#paqDescripcion').val());
		
		listaPaquetes.push({
			"paqId":ps.paqId,
			"paqDescripcion":ps.paqDescripcion,
			"paqCant":$('#listCantidadPaq').val(),
			"paqCosto":mayorCosto,
		});
		//console.log(listaPaquetes);
		llenarTablaListaPaquetes(listaPaquetes);
		$('#envListaPaquetes').val(JSON.stringify(listaPaquetes));
	});

	//const data = sendJson(getCuentaCorriente, params, null, llenarTablaCuentaCorriente); 

	$('#registrarEnvio').click(function(){
		if(Array.isArray(listaPaquetes) && listaPaquetes.length){
			mostrarPreloader();
			$('#formListaPaquetes').submit();
		} else {
			swal("Ha ocurrido un error!", "No puedes registrar un envío sin paquetes. Agrega paquetes para registrar el envío.", "error");
		}
	});


	// ubicar en otro archivo
	//se esconde el formulario de registro de direcciones
	$('#dirOrigenRegister').hide();
	$('#dirOrigenSeleccion').hide();

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