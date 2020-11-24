function dimensionFormat(x) {
	dimension = Number.parseFloat(x).toFixed(4);	
  return dimension.toString().replace(".",",");
}
function peso(x) {
	const peso = Number.parseFloat(x).toFixed(2)
  return peso.toString().replace(".",",");
}
function financial(x){
	return x.toFixed(2).replace(".",",").replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}
function obtenerDimensionesMetricas(dimensiones, dimensionUnidad){
  let dimensionesMetricas = 0;
  switch(dimensionUnidad){
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
  return dimensionesMetricas;
}
function obtenerPesoEnKg(peso, pesoUnidad){
  let pesoEnKg = 0.0;
  switch(pesoUnidad){
    case 'mg':
      pesoEnKg = (peso / 1000000);
      break;
    case 'gr':
      pesoEnKg = (peso / 1000);
      break;
    case 'oz':
      pesoEnKg = (peso / 35.27);
      break;
    case 'kg':
      pesoEnKg = peso;
      break;
    case 'lb':
      pesoEnKg = (peso / 2.2);
      break;
    case 't':
      pesoEnKg = (peso / 0.001);
      break;
    default:
      pesoEnKg = 0;
      break;
  }
  return pesoEnKg;
}