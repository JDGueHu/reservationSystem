$( document ).ready(function() {
	$(".confirm").confirm({
	    text: "Va a eliminar un registro ¿Desea continuar?",
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$( "#ajaxButton" ).click(function(){

	  	var data = [
	  		$("#phone").val(),
	  		$("#idView").val(),
	  		$("#phoneType").val()
	  	];

	  	alert(data);

		$.ajax({
		  url: '../../configuracion/telefono',
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : data
		}).done(function(response){

		});

	});


	         
});
