$( document ).ready(function() {
	$(".confirm").confirm({
	    text: "Va a eliminar un registro ¿Desea continuar?",
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$( "#ajaxButton" ).click(function(){
	  	var data = "phone="+$("#phone").val()+"&owner_id="+$("#idView").val()+"&phone_type_id="+$("#phoneType").val();

		$.ajax({
		  url: '../../administracion/telefono',
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  datatype:'json',
		  data : data
		}).done(function(response){
			$("#example").empty();
			var actionShow = '<td><a title="Eliminar" href="" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a><td/>'
			$("#example").append("<thead><tr><th>Tipo</th><th>Número telefónico</th><th>Acciones</th></tr></thead>");
			$("#example").append("<tbody></tbody>");
			for(i=0; i<response.length; i++){
				$("#example").append('<tr role="row" class="odd"><td>'+response[i].phone_type_id+'</td><td>'+response[i].phone+'</td>'+actionShow+'</tr>');
			}
			$("#myModalNorm").modal('hide');
				
		});

	});
	         
});
