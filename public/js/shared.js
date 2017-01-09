$( document ).ready(function() {
	$(".confirm").confirm({
	    text: "Va a eliminar un registro ¿Desea continuar?",
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$( "#ajaxButton" ).click(function(){
	  	var data = "phone="+$("#phone").val()+"&owner_id="+$("#idView").val()+"&phone_type_id="+$("#phoneType").val();

	  	if($("#phoneType").val() != ""){
	  		if($("#phone").val() != ""){
	  			
				$.ajax({
				  url: '../../administracion/telefono',
				  headers: {'X-CSRF-TOKEN': $('#token').val()},
				  type: 'POST',
				  datatype:'json',
				  data : data
				}).done(function(response){
					
					$("#example").empty();
					$("#example").append("<thead><tr><th>Tipo</th><th>Número telefónico</th><th>Acciones</th></tr></thead>");
					$("#example").append("<tbody></tbody>");

					var actionDelete;
					if(response.length == 0){
						$("#example").append('<tr class="odd"><td valing="top" colspan="3" class="dataTables_empty">No hay registros para mostrar</td></tr>');	
					}
					else{
						for(i=0; i<response.length; i++){
							actionDelete = '<td><a title="Eliminar" onclick="phoneDelete('+response[i].id+')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a><td/>'
							$("#example").append('<tr role="row" class="odd"><td>'+response[i].name+'</td><td>'+response[i].phone+'</td>'+actionDelete+'</tr>');
					}
					}

					$("#phoneType").val("");
					$("#phone").val("");
					$("#myModalNorm").modal('hide');
						
				});
			}
			else{alert("Los campos tipo y número telefónico son obligatorios");}
		}
		else{alert("Los campos tipo y número telefónico son obligatorios");}

	});
	         
});

function phoneDelete ($id){

	alert($id);

	$.ajax({
	  url: '../../administracion/telefono/'+$id+'/'+$("#idView").val()+'/destroy',
	  headers: {'X-CSRF-TOKEN': $('#token').val()},
	  type: 'GET',
	  datatype:'json'
	}).done(function(response){

		$("#example").empty();
		$("#example").append("<thead><tr><th>Tipo</th><th>Número telefónico</th><th>Acciones</th></tr></thead>");
		$("#example").append("<tbody></tbody>");

		var actionDelete;
		if(response.length == 0){
			$("#example").append('<tr class="odd"><td valing="top" colspan="3" class="dataTables_empty">No hay registros para mostrar</td></tr>');	
		}
		else{
			for(i=0; i<response.length; i++){
				actionDelete = '<td><a title="Eliminar" onclick="phoneDelete('+response[i].id+')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a><td/>'
				$("#example").append('<tr role="row" class="odd"><td>'+response[i].name+'</td><td>'+response[i].phone+'</td>'+actionDelete+'</tr>');
			}
		}

	});

}
