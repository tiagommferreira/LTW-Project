function openVoteModal(button){

	// base url pc
	var BASE_URL = "http://ltw.feup:8888/projetoLTW";
	// base url da feup
	//var BASE_URL = "http://gnomo.fe.up.pt/~ei12050/projetoLTW"
	

	var poll_id = $(button).attr("id");

	$('#poll_vote_modal').modal("show");

	$.getJSON(BASE_URL+'/api/polls.php?id='+poll_id, function( data ) {	

		$("h3[id='poll_modal_title']").text(data.by_id.question);
		var answers = data.by_id.answers;
		for (i = 0; i < answers.length; i++) { 
   			$( "#poll_modal_answers" ).append('<input type="radio" name="option" value="' + answers[i] +'"> '+answers[i]+'<br>');
		}
		
	});
}