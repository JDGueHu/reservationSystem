$( document ).ready(function() {

	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true
	});

	$('#customer_id').change(function(){
		$( "#reservableForm" ).submit();
	});
	
	$('#field_id').change(function(){
		$( "#reservableForm" ).submit();
	});
	
	$('#date').change(function(){
		$( "#reservableForm" ).submit();
	});

});

