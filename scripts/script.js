
function listeners() {
	$('.register-title').hover(function() {
        $(this).css('cursor','pointer');
    });
	$(".register-title").click(function(){
  		$(".login").hide();
      $('#about_us').hide();
  		$(".register").toggle();
	});

  $('.login-title').hover(function() {
        $(this).css('cursor','pointer');
    });
  $(".login-title").click(function(){
      $(".register").hide();
      $('#about_us').hide();
      $(".login").toggle();
  });


  $('#about_us_button').hover(function() {
        $(this).css('cursor','pointer');
    });
  $("#about_us_button").click(function(){
      $(".register").hide();
      $(".login").hide();
      $('#about_us').toggle();
  });
}

$(document).ready(listeners);