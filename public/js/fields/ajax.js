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

		url="../disponibilityStore";
		
		data = "days="+days+"&permissionId="+event.target.id;

		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('#token').val()},
		  type: 'POST',
		  data : {days_checked:days_checked, prices:prices, ini_hour:$('#ini_hour').val(), fin_hour:$('#fin_hour').val(), field_id:$('#field_id').val()},
		  dataType: "json", 
		}).done(function(response){
			console.log(response);
		});

	});
	
});