
function listeners() {
	$(".register-title").click(function(){
  		$(".login").hide();
  		$(".register").show();
	});

	$(".login-title").click(function(){
  		$(".register").hide();
  		$(".login").show();
	});
}

$(document).ready(listeners);