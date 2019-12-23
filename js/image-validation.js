$(document).ready(function(){
	$('#submitCompany').click(function(){
		var image_name = $('#image').val();
		if(image_name == ''){
			alert("Please select an image");
			return false;
		}else{
			var extension = $('#image').val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension, ['png', 'jpg', 'jpeg']) == -1){
				alert('Invalid extension file. Allowed extension(png,jpeg,jpg) ');
				$('#image').val('');
				return false;
			}
		}
	});
 });