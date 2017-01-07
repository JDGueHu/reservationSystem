$( document ).ready(function() {
	$(".confirm").confirm({
	    text: "Va a eliminar un registro ¿Desea continuar?",
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$( "#phoneForm" ).submit(function(){
		alert("hola");
	  	var data = [
	  		$("#phone").val(),
	  		$("#idView").val(),
	  		$("#phoneType").val()
	  	];

		$.ajax({
		  url: 'configuracion/store',
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : data
		});

	});
	         
});
