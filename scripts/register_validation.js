function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

$(function(){
	// base url pc
	var BASE_URL = "http://ltw.feup:8888/projetoLTW";
	// base url da feup
	//var BASE_URL = "http://gnomo.fe.up.pt/~ei12050/projetoLTW"


	$("input[name='register_username']").focusout(function(){
		var username = $(this).val();
		var input = $(this);
		if(!username){
			input.removeAttr( 'style' );
		}else{
			$.getJSON(BASE_URL+'/api/users.php?username='+username, function( data ) {
				if(data.by_username.username != username){
					input.css("border-bottom", "2px solid green");
				}else{
					input.css("border-bottom", "2px solid red");
				}
			});
		}	
	});


	$("input[name='register_email']").focusout(function(){
		var email = $(this).val();
		var input = $(this);

		if(!email){
			input.removeAttr('style');
		}else{
			if(IsEmail(email) == true){
				$.getJSON(BASE_URL+'/api/users.php?email='+email, function( data ) {
					if(data.by_email.email != email){
						input.css("border-bottom", "2px solid green");
					}else{
						input.css("border-bottom", "2px solid red");
					}
				});
			}else{
				input.css("border-bottom", "2px solid red");
			}
			
		}	
	});


});




