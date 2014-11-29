function listeners() {
  $("#add-answer-management").click(function(){ 
    var num_choices = $('.possible_answers_management').children("input").length;
    num_choices = num_choices+1;
    $( ".possible_answers_management" ).append('<input type="text" name="option_'+ num_choices + '" class="poll-option" placeholder="Write your answer..."><i id="remove-answer-management" class="fa fa-minus-circle fa-lg" style="color: red;"></i><br>');
  });

  $('.possible_answers_management').on('click', '#remove-answer-management', function() {
    $(this).prev().remove(); //este remove a caixa onde escreves
    $(this).next().remove(); //este escreve o botao
    $(this).remove(); //este remove o br a frente
    var choices = $('.possible_answers_management').children("input");
    for(var i = 0; i<choices.length; i = i+1) {
      choices.eq(i).attr("name", "option_"+(i+1));
    }
  });
}
$(document).ready(listeners);