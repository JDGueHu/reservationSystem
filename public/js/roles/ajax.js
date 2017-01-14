$( document ).ready(function() {
	$(".permission").change(function(event) {

		if($('#'+event.target.id).prop('checked')){

			url = "../../administracion/rol/permissionsStore";
			data = "roleId="+$("#roleId").val()+"&permissionId="+event.target.id;

			alert(data);

			$.ajax({
			  url: url,
			  headers: {'X-CSRF-TOKEN': $('#token').val()},
			  type: 'POST',
			  datatype:'json',
			  data : data
			}).done(function(response){

				
			});

		}else{
			//Ajax eliminar
			alert('.'+event.target.id);
		}

	})
})