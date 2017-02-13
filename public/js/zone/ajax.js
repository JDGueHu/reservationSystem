$( document ).ready(function() {
	$("#zone_id").prop( "disabled", true );
	$("#zone_type_id").change(function(event){	

		var url = window.location.href; 
		var sub_url = url.substring(url.length,url.length - 6);

		var zone_type_id = event.target.value;
		if(zone_type_id == "" || zone_type_id== null)zone_type_id=0;

		var zone_id = $('#zone_id_edit').val();

		if(zone_id=="" || zone_id==null) zone_id =0;

		if(sub_url == "create"){ url = zone_id+"/"+zone_type_id+"/getZonasCreate"; }
		else{ url = zone_type_id+"/getZonasEdit";}

		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
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

