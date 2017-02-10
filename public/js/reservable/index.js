$( document ).ready(function() {
	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true
	});

	$('#customer_id').change(function(event){
		alert($('#customer_id').val());
	});
	
});