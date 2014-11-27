function openEditModal(button){
	//TODO

	/*
	// base url pc
	var BASE_URL = "http://localhost:80/proj";
	//var BASE_URL = "http://ltw.feup:8888/projetoLTW";
	//
	// base url da feup
	//var BASE_URL = "http://gnomo.fe.up.pt/~ei12050/projetoLTW"
	
	var poll_id = $(button).attr("id");

	// get poll by id
	$.getJSON(BASE_URL+'/api/polls.php?id='+poll_id, function( data ) {	
		$("h3[id='poll_modal_title']").text(data.by_id.question);
		var answers = data.by_id.answers;
		$( "#poll_modal_answers" ).empty();	// empty options div
		for (i = 0; i < answers.length; i++) { 
			// get option string
			$.getJSON(BASE_URL+'/api/polls.php?answer_id='+answers[i], function( data_answer ) {
				$( "#poll_modal_answers" ).append('<input type="radio" name="option" value="' + data_answer.answer_by_id.id +'"> '+data_answer.answer_by_id.answer+'<br>');
			});

   		}
	});

	$('#poll_vote_modal').modal("show");
	*/
}

$(document).ready(function() {
	    $('#manage_polls_list').DataTable();
} );