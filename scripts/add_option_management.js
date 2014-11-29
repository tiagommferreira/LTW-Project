function listeners() {
  $("#add-answer-management").click(function(){ 
    var num_choices = $('.possible_answers_management').children("input").length;
    var num_choices2 = $('.possible_answers_management').children("p").length;
    var num_choices_final = num_choices + num_choices2;
    num_choices_final = num_choices_final+1;
   
    $( ".possible_answers_management" ).append( '<input type="text" name="option_'+ num_choices_final + '" class="poll-option" placeholder="Write your answer..."><i id="remove-answer-management" class="fa fa-minus-circle fa-lg" style="color: red;"></i><br>');
  });
  $('.possible_answers_management').on('click', '#remove-answer-management', function() {
    $(this).prev().remove(); //este remove a caixa onde escreves
    $(this).next().remove(); //este escreve o botao
    $(this).remove(); //este remove o br a frente
    var choices = $('.possible_answers_management').children("input");
    var num_choices = choices.length;
    var num_choices2 = $('.possible_answers_management').children("p").length;
    var num_choices_final =  num_choices + num_choices2;

    console.log(num_choices_final);

    for(var i = num_choices; i<num_choices_final; i = i+1) {
      choices.eq(i).attr("name", "option_"+i); 
    }

  });
}
$(document).ready(listeners);