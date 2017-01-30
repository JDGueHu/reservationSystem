$( document ).ready(function() {

	$( "#customer_id" ).change(function(){

		var id_fields = [];

		$.ajax({
		  url: "../disponibilidad/showFields",
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : "customer_id="+$('#customer_id').val(),
		  dataType: "json", 
		}).done(function(response){

			$("#contenedor").empty();

			for($i=0;$i<response.length;$i++){
				$("#contenedor").append(
				'<h4 class="separador_short"><span class="label label-primary"><input type="checkbox" name="fields[]"checked/>'+' '+response[$i].name+'</span></h4><div class="form-group" id="'+response[$i].id+'"></div>'
				);

				id_fields.push(response[$i].id);
			}

			for($k=0;$k<id_fields.length;$k++){
				
				$.ajax({
				  url: "../disponibilidad/showAvailabilities",
				  headers: {'X-CSRF-TOKEN': $('#token').val()},
				  type: 'POST',
				  data : "field_id="+id_fields[$k],
				  dataType: "json", 
				}).done(function(response){
					console.log(response);

					for($l=0;$l<response.length;$l++){
						$('#'+response[$l].field_id).append("<thead><tr><th>Tipo</th><th>Número telefónico</th><th>Acciones</th></tr></thead>");
						$('#'+response[$l].field_id).append("<tbody></tbody>");

				}



				});

			}
		});

	});

});