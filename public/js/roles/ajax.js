$( document ).ready(function() {
	$(".permission").change(function(event) {

		if($('#'+event.target.id).prop('checked')){
			url = "../../../administracion/rol/permissionsStore";

		}else{
			url = "../../../administracion/rol/permissionsDelete";
		}

		data = "roleId="+$("#roleId").val()+"&permissionId="+event.target.id;

		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : data
		}).done(function(response){
			console.log(response);			
		});

	})
})