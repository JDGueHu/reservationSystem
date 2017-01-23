$( document ).ready(function() {
	
	$(".precio").prop( "disabled", true );

	$("input[name=days]").click(function(event){
		if($("input[value="+event.target.value+"]").prop('checked')){
			$("#"+event.target.value).prop( "disabled", false );	
		}
		else{
			$("#"+event.target.value).prop( "disabled", true );	
		}
	});


	
});