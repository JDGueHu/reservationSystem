$( document ).ready(function() {

	$( "#customer_id" ).change(function(){

		var id_fields = [];

		$.ajax({
		  url: "../generarDisponibilidad/showFields",
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : "customer_id="+$('#customer_id').val(),
		  dataType: "json", 
		}).done(function(response){

			$("#contenedor").empty();

			for(var i=0;i<response.length;i++){
				$("#contenedor").append(
				'<h4 class="separador_short"><span class="label label-primary"><input type="checkbox" name="fields" value="'+response[i].id+'" checked/>'+' '+response[i].name+'</span></h4><div class="form-group"><table id="example" class="table table-hover '+response[i].id+'" cellspacing="0" width="100%"><thead><tr><th>Día</th><th>Franja horaria</th><th>Precio</th></tr></thead><tbody></tbody></table></div>'
				);

				id_fields.push(response[i].id);
			}

			for(var k=0;k<id_fields.length;k++){
				
				$.ajax({
				  url: "../generarDisponibilidad/showAvailabilities",
				  headers: {'X-CSRF-TOKEN': $('#token').val()},
				  type: 'POST',
				  data : "field_id="+id_fields[k],
				  dataType: "json", 
				}).done(function(response){					
					console.log(response);
					for(var l=0;l<response.length;l++){

						$('.'+response[l].field_id).append('<tr><td>'+response[l].name+'</td><td>'+response[l].ini_hour+' a '+response[l].fin_hour+'</td><td>'+response[l].price+'</td><tr>');					

					}

				});

			}
		});

	});

	$( "#storeButton" ).click(function(){

		var fields = document.getElementsByName("fields");
		var fields_checked = [];

		for(var i=0;i<fields.length;i++){
			if(fields[i].checked){
				fields_checked.push(fields[i].value);
			}		
		}

		$.ajax({
		  url: "../generarDisponibilidad",
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : {fields_checked:fields_checked, customer_id:$('#customer_id').val() },
		  dataType: "json", 
		}).done(function(response){
			//console.log(response);
			window.location.replace('../generarDisponibilidad');
		});

		
	});

});

