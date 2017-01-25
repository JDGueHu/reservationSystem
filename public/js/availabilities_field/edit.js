$( document ).ready(function() {

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

	$("input:checkbox:not(:checked)").each(function(){
		$('#'+$(this).val()).prop( "disabled", true );
	});

	
	$(".ajax_button").click(function(event){

		var days = document.getElementsByName("days");
		var days_checked = [];
		var prices = [];

		for(var i=0;i<days.length;i++){
			if(days[i].checked){
				days_checked.push(days[i].value);
				prices.push($('#'+days[i].value.toString()).val());
			}
		}

		url="../../update";
		
		data = "days="+days+"&permissionId="+event.target.id;

		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : {days_checked:days_checked, prices:prices, ini_hour:$('#ini_hour').val(), fin_hour:$('#fin_hour').val(), field_id:$('#field_id').val(), availability_field_id:$('#availability_field_id').val()},
		  dataType: "json", 
		}).done(function(response){
			console.log(response);
			//window.location.replace('../../'+$('#field_id').val()+'/index');
		});

	});

})