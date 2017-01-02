$( document ).ready(function() {
	$( "#zone_id" ).prop( "disabled", true );
	$("#zone_type_id").change(function(event){	

		$.ajax({
		  url: "http://localhost:8000/reservationSystem/public/configuracion/zona/"+event.target.value+"/getZonas",
		  type: 'GET',
		  dataType: 'json'
		}).done(function(response){
			$("#zone_id").empty();
			if(response.length==0){
				$( "#zone_id" ).prop( "disabled", true );
			}else{
				$( "#zone_id" ).prop( "disabled", false );
				for(i=0; i<response.length; i++){
					$("#zone_id").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
				}
			}
		});

	});
});
