$(function(){
	// base url pc
	//var BASE_URL = "http://ltw.feup:8888/projetoLTW";
	// base url da feup
	var BASE_URL = "http://gnomo.fe.up.pt/~ei12050/projetoLTW"

// while you are typing using keypress event
	$("input[name='username']").bind('keyup',function(){
		// get the value of the input
		var username = $(this).val();
		var input = $(this);
		$.getJSON(BASE_URL+'/api/users.php?username='+username, function( data ) {
			if(data.username == username){
				input.css("border-bottom", "2px solid red");
			}
		});
	});

	$("input[name='username']").focusout(function(){
		var username = $(this).val();
		var input = $(this);
		if(!username){
			input.removeAttr( 'style' );
		}else{
			$.getJSON(BASE_URL+'/api/users.php?username='+username, function( data ) {
				if(data.username != username){
					input.css("border-bottom", "2px solid green");
				}
			});
		}	
	});
});

