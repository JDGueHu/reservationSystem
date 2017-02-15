$( document ).ready(function() {

	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true
	});

	$('#customer_id').change(function(){
		$( "#reservableForm" ).submit();
	});
	
	$('#date').change(function(){
		$( "#reservableForm" ).submit();
	});


	$('.enable').change(function(event){
		
		$.ajax({
		  url: "../reservas/reservable/enable_disable",
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : {availability_id:$('.'+event.target.id).val()},
		  dataType: "json", 
		}).done(function(response){
			
		});
	});


});

