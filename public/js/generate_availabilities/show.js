$( document ).ready(function() {

	$("#customer_id").prop( "disabled", true );
	$('input[name="fields"]').prop( "disabled", true );

	var fields_checked = $('#fields_checked').val();

	for(i=0;i<fields_checked.length;i++){
		if(fields_checked.charCodeAt(i) != 91 && fields_checked.charCodeAt(i) != 93 && fields_checked.charCodeAt(i) != 44){
			$('#'+fields_checked[i].toString()).prop('checked',true);
		}

	}
	
})