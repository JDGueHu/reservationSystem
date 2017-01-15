$( document ).ready(function() {
	var permissions = $('#permissionsList').val();
	var checked = [];
	var i=0;

	for(i;i<permissions.length;i++){
		if(permissions.charCodeAt(i) != 91 && permissions.charCodeAt(i) != 93 && permissions.charCodeAt(i) != 44){
			$('#'+permissions[i]).prop('checked','true');
		}
	}
	
})