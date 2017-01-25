$( document ).ready(function() {

	$("#ini_hour").prop( "disabled", true );
	$("#fin_hour").prop( "disabled", true );
	$(".precio").prop( "disabled", true );


	var days_availabilities_per_field = $('#days_availabilities_per_field').val();
	var prices_availabilities_per_field = $('#prices_availabilities_per_field').val();
	var checked = [];
	var i=0;

	for(i;i<days_availabilities_per_field.length;i++){
		if(days_availabilities_per_field.charCodeAt(i) != 91 && days_availabilities_per_field.charCodeAt(i) != 93 && days_availabilities_per_field.charCodeAt(i) != 44){
			$('input[value='+days_availabilities_per_field[i].toString()+']').prop('checked','true');
		}

		if(prices_availabilities_per_field.charCodeAt(i) != 91 && prices_availabilities_per_field.charCodeAt(i) != 93 && prices_availabilities_per_field.charCodeAt(i) != 44){
			$('#'+ days_availabilities_per_field[i].toString() +' option[value='+ prices_availabilities_per_field[i].toString() +']').attr("selected",true);
		}
	}

	$('input[name="days"]').prop( "disabled", true );
	
})