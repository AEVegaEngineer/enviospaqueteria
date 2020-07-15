$('[id^=btnEntregar]').click(function(){
  var idenvio = $(this).attr('id').replace("btnEntregar", "");
  var url = Servidor+"enviar/"+idenvio;	  
  //getJson(url, null, null, popularTablaListaPaquetes); 
  console.log(url)
  $('#modalDetallesEntrega').modal('show');
});
$('[id^=btnStatusUpdate]').click(function(){
	var idenvio = $(this).attr('id').replace("btnEntregar", "");
	var url = Servidor+"enviar/"+idenvio;	  
  //getJson(url, null, null, popularTablaListaPaquetes); 
  console.log(url)
  swal({
	  title: "Are you sure?",
	  text: "Once deleted, you will not be able to recover this imaginary file!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    swal("Poof! Your imaginary file has been deleted!", {
	      icon: "success",
	    });
	  } else {
	    swal("Your imaginary file is safe!");
	  }
	});
});