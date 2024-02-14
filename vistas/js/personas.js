


/*=============================================
EDITAR USUARIO
=============================================*/
$(".persona-tabla").on("click", ".btnEditarPersona", function(){
	
	var idPersona = $(this).attr("idPersona");
	
	var datos = new FormData();
	datos.append("idPersona", idPersona);

	$.ajax({

		url:"ajax/personas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log(respuesta);

			$("#idPersona").val(idPersona);

			$("#eNacionalidad").val(respuesta["nacionalidad"]);
			$("#eCedula").val(respuesta["ci"]);
			$("#ePrimerNombre").val(respuesta["primer_nombre"]);
			$("#eSegundoNombre").val(respuesta["segundo_nombre"]);
			$("#ePrimerApellido").val(respuesta["primer_apellido"]);
			$("#eSegundoApellido").val(respuesta["segundo_apellido"]);
			$("#eFechaNacimiento").val(respuesta["fecha_nacimiento"]);
			$("#eSexo").val(respuesta["sexo"]);
			$("#eEstadoCivil").val(respuesta["estado_civil"]);
			$("#eTelefono").val(respuesta["telefono"]);
			$("#eEstado").val(respuesta["estado"]);
			$("#eMunicipio").val(respuesta["municipio"]);
			$("#eParroquia").val(respuesta["parroquia"]);
			$("#eCorreo").val(respuesta["correo"]);
			
		}

	});

})



/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".persona-tabla").on("click", ".btnEliminarPersona", function(){

  var idPersona = $(this).attr("idPersona");
 
  swal({
    title: '¿Está seguro de borrar la Persona?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Persona!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=personas&idPersona="+idPersona;

    }

  })

})




