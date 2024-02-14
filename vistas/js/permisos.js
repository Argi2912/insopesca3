/*###############################
#    Rellenar campo Cedula      #
###############################*/ 

$("#VSolicitante").change(function (){
    var idPersona = $("#VSolicitante").val();
    var datos = new FormData();
	datos.append("idPersona", idPersona);
    
    $.ajax({

		url:"ajax/permisos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log(respuesta);

			if(Object.keys(respuesta).length > 0){
				$("#VBarco").prop('disabled', false);
				$("#VBarco").find('option')
				.remove()
				.end();

				respuesta.map((e)=>{
					$("#VBarco").append(`
					<option value="${e[0]}">
					${e[2]}</option>`);
				});

			}
		
		}

	});

})

$(".permisos-tabla").on("click", ".btnEliminarPermiso", function(){

	var idPermiso = $(this).attr("permiso");
   
	swal({
	  title: '¿Está seguro?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar Persona!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=permiso&permiso="+idPermiso;
  
	  }
  
	})
  
  })


$(".permisos-tabla").on("click", ".btnReporte", function(){

	var permiso = $(this).attr("permiso");

	window.open("extensiones/tcpdf/pdf/permiso.php?codigo="+permiso, "_blank"); 

})