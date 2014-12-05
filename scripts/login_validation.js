
function verifyValidLogin(){
	var username_check_val = $("input[name='login_username']").val();
	var password_check_val = $("input[name='login_password']").val();
	
	if(password_check_val && username_check_val){
		$("input[type='submit']").removeAttr("disabled");
	}
}

$(document).ready(function() {
	$("input[type='submit']").attr('disabled', 'disabled');
});

$(document).keypress(function(e) {
    if(e.which == 13) {
        verifyValidLogin();
    }
});

$(function(){

	$("input[name='login_username']").focusout(function(){
		$("input[type='submit']").attr('disabled', 'disabled');
		var username = $(this).val();
		var input = $(this);
		if(!username){
			input.removeAttr('style');
		}else{
			verifyValidLogin();
		}	
	});

	$("input[name='login_password']").focusout(function(){
		$("input[type='submit']").attr('disabled', 'disabled');
		var password = $(this).val();
		var input = $(this);
		if(!password){
			input.removeAttr('style');
		}else{
			verifyValidLogin();
		}	
	});

});




