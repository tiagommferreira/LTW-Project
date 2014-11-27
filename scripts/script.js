
function listeners() {
	$('.register-title').hover(function() {
        $(this).css('cursor','pointer');
    });
	$(".register-title").click(function(){
  		$(".login").hide();
  		$(".register").show();
	});

	$('.login-title').hover(function() {
        $(this).css('cursor','pointer');
    });
	$(".login-title").click(function(){
  		$(".register").hide();
  		$(".login").show();
	});
}

$(document).ready(listeners);