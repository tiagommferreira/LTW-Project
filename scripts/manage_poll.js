var api_return_res;


function pollAPI(BASE_URL, poll_id){


	var answers_array =[];
	var answers_votes_array = [];

	

}

function pollStatistics(button){
	//TODO

	
	// base url pc
	//var BASE_URL = "http://localhost:80/proj";
	var BASE_URL = "http://ltw.feup:8888/projetoLTW";
	//
	// base url da feup
	//var BASE_URL = "http://gnomo.fe.up.pt/~ei12050/projetoLTW"
	
	var poll_id = $(button).attr("id");

	

	var answers_array =[];
	var answers_votes_array = [];


    var poll = $.ajax({
      url: BASE_URL+'/api/polls.php?id='+poll_id,
      dataType:"jsonp",
      async: false
    }).responseText;

    // poll object
    var object = JSON.parse(poll);
    var answers_id = object.by_id.answers;


    var answers_votes_array = [];
    var poll_answers_array = [];

    for(var i = 0; i < answers_id.length; i++){

	    var poll_answers = $.ajax({
	      url: BASE_URL+'/api/polls.php?answer_id='+answers_id[i],
	      dataType:"jsonp",
	      async: false
	    }).responseText;

	    // answer object
	     var object_aux = JSON.parse(poll_answers);
	     answers_votes_array.push(object_aux.answer_by_id.votes);
	     poll_answers_array.push(object_aux.answer_by_id.answer);
	}

	$("h3[id='poll_modal_title']").text(object.by_id.question);


	var data_array = [];

	for(var i = 0; i < answers_votes_array.length; i++){
		var aux=[];
		aux['label'] =poll_answers_array[i];
		aux['value'] =answers_votes_array[i];
		data_array.push(aux);
	}
//Morris charts snippet - js
	$( "#poll_chart" ).empty();
	$.getScript('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',function(){
	$.getScript('http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js',function(){

      Morris.Donut({
        element: 'poll_chart',
        data: data_array
      });
      
  
	});
});

	$('#poll_statistic_modal').modal("show");
	
}

$(document).ready(function() {
	    $('#manage_polls_list').DataTable();
} );