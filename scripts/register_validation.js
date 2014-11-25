function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}


function verifyRegistrationValid(){
	var email_check_val = $("input[name='register_email']").val();
	var password_check_val = $("input[name='register_password']").val();
	var password_confirm_check_val = $("input[name='register_password_confirm']").val();
	var username_check_val = $("input[name='register_username']").val();

	var email_style = $("input[name='register_email']").css("border-bottom");
	var password_style = $("input[name='register_password']").css("border-bottom");
	var password_confirm_style = $("input[name='register_password']").css("border-bottom");
	var username_style = $("input[name='register_username']").css("border-bottom");


	if(email_check_val && password_check_val && username_check_val && password_confirm_check_val
		&& email_style === "2px solid rgb(0, 128, 0)" && password_style === "2px solid rgb(0, 128, 0)" && username_style === "2px solid rgb(0, 128, 0)"
		&& password_confirm_style === "2px solid rgb(0, 128, 0)"
		){
		$("input[type='submit']").removeAttr("disabled");
	}
}

$(document).ready(function() {
	$("input[type='submit']").attr('disabled', 'disabled');
});


$(function(){
	// base url pc
	var BASE_URL = "http://ltw.feup:8888/projetoLTW";
	// base url da feup
	//var BASE_URL = "http://gnomo.fe.up.pt/~ei12050/projetoLTW"

	$("input[name='register_username']").focusout(function(){
		$("input[type='submit']").attr('disabled', 'disabled');
		var username = $(this).val();
		var input = $(this);
		if(!username){
			input.removeAttr( 'style' );
		}else{
			$.getJSON(BASE_URL+'/api/users.php?username='+username, function( data ) {
				if(data.by_username.username != username){
					input.css("border-bottom", "2px solid rgb(0, 128, 0)");
					verifyRegistrationValid();
				}else{
					input.css("border-bottom", "2px solid red");
				}
			});
		}	
	});


	$("input[name='register_email']").focusout(function(){
		$("input[type='submit']").attr('disabled', 'disabled');
		var email = $(this).val();
		var input = $(this);

		if(!email){
			input.removeAttr('style');
		}else{
			if(IsEmail(email) == true){
				$.getJSON(BASE_URL+'/api/users.php?email='+email, function( data ) {
					if(data.by_email.email != email){
						input.css("border-bottom", "2px solid rgb(0, 128, 0)");
						verifyRegistrationValid();
					}else{
						input.css("border-bottom", "2px solid red");
					}
				});
			}else{
				input.css("border-bottom", "2px solid red");
			}
		}	
	});

	$("input[name='register_password']").focusout(function(){
		$("input[type='submit']").attr('disabled', 'disabled');
		var password = $(this).val();
		var input = $(this);
		if(!password){
			input.removeAttr('style');
		}
		else if(password.length < 6){
			input.css("border-bottom", "2px solid red");
		}else{
			input.css("border-bottom", "2px solid rgb(0, 128, 0)");
			verifyRegistrationValid();
		}	
	});



	$("input[name='register_password_confirm']").focusout(function(){
		$("input[type='submit']").attr('disabled', 'disabled');
		var password_confirm = $(this).val();
		var password = $("input[name='register_password']").val();
		var input = $(this);
		if(!password_confirm){
			input.removeAttr('style');
		}
		else if(password != password_confirm){
			input.css("border-bottom", "2px solid red");
		}else{
			input.css("border-bottom", "2px solid rgb(0, 128, 0)");
			verifyRegistrationValid();
		}	
	});

});




