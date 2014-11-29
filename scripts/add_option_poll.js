var counter = 2;

function listeners() {
	$("#add-answer").click(function(){
		counter = counter+1; 
  		$( ".possible_answers" ).append( '<input type="text" name="option_'+ counter + '" class="poll-option" placeholder="Write your answer..."><i id="remove-answer" class="fa fa-minus-circle fa-lg" style="color: red;"></i><br>');
	});
	$('.possible_answers').on('click', '#remove-answer', function() {
		$(this).prev().remove();
		$(this).next().remove();
		$(this).remove();
		var choices = $('#poll_edit_answers').children("input");
		for(var i = 0; i<choices.length; i = i+1) {
			choices.eq(i).attr("name", "option_"+(i+1));
		}
		console.log(choices);
	});
}

$(document).ready(listeners);