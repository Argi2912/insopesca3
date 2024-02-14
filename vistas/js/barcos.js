


/*=============================================
EDITAR USUARIO
=============================================*/
$(".barcos-tabla").on("click", ".btnEditarBarco", function(){
	
	var idBarco = $(this).attr("idBarco");
	console.log(idBarco);
	
	var datos = new FormData();
	datos.append("idBarco", idBarco);

	$.ajax({

		url:"ajax/barcos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log(respuesta);

			$("#idBarco").val(idBarco);

			$("#eDueño").val(respuesta["dueño"]);

			$("#eNombreBarco").val(respuesta["barco"]);
			$("#eMatricula").val(respuesta["matricula"]);
			$("#eEslora").val(respuesta["eslora"]);
			$("#eManga").val(respuesta["manga"]);
			$("#ePuntal").val(respuesta["puntal"]);
			$("#eCOMPA").val(respuesta["comppa"]);
			$("#eUAB").val(respuesta["uab"]);
			$("#eEspecies").val(respuesta["especies"]);
			$("#ePesca").val(respuesta["arte_pesca"]);


			
			
		}

	});

})



/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".barcos-tabla").on("click", ".btnEliminarBarco", function(){

  var idBarco = $(this).attr("idBarco");
 
  swal({
    title: '¿Está seguro de borrar el Barco?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Barco!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=barcos&idBarco="+idBarco;

    }

  })

})



