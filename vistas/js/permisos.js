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

            $("#Cedula").val(respuesta["ci"]);
            $("#Estado").val(respuesta["estado"]);
            $("#soli").val(respuesta["primer_nombre"]+" "+respuesta["primer_apellido"]);


		}

	});

})