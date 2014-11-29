<?php
	session_start(); 
	$user = unserialize($_SESSION['user']);
?>


<div class="title">
<h1>Manage Polls</h1>
</div>

<div class="content">

	<table id="manage_polls_list" class="table table-striped table-hover">
	    <thead>
	        <tr>
	            <th><center>Question</center></th>
	            <th><center>Number of Options</center></th>
	            <th><center>Number of Answers</center></th>
	            <th><center>Manage</center></th>
	        </tr>
	    </thead>
	    <tbody>
			<?php
				chdir('Pages/');	// change dir in order to includes work fine
				include '../database/manage_database.php';
				$user_polls = get_all_polls_by_user($user->getID());
				chdir('../');	// change dir to last dir
				if($user_polls!=false){
					foreach($user_polls as $poll){

			?>

	       	<tr> 
	            <td><center><?php echo $poll->getQuestion(); ?> </center></td>
	            <td><center><?php echo count($poll->getAnswers()); ?> </center></td>
	            <td><center><?php echo $poll->getAnswersReceived(); ?> </center></td>
	            <!-- TODO: ONCLICK -->
	            <td><center>

	            	<button id="<?php echo $poll->getID(); ?>" onclick="pollStatistics(this);" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-pie-chart fa-lg" style="color: #E8D500;"></i></button>
	            	<button id="<?php echo $poll->getID(); ?>" onclick="" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-cogs fa-lg" style="color: black;"></i></button>
	            	<button id="<?php echo $poll->getID(); ?>" onclick="deletePoll(this)" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-times fa-lg" style="color: red;"></i></button>		
	            	
	            	</center></td>
	        </tr>

	        <?php
	        	}
			}
			?>
	        
	    </tbody>
	</table>


	<div id="poll_statistic_modal" class="modal fade">
	 	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        		<h3 id="poll_modal_title" class="modal-title">Modal title</h3>
	      		</div>
	      		<div class="modal-body">
					<div class="possible_answers" id="poll_chart">
					</div>
	      		</div>
	      		<div class="modal-footer" >
	        		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div>


	<div id="poll_modal" class="modal fade">
	 	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        		<h3 id="poll_modal_title" class="modal-title">Modal title</h3>
	      		</div>
	      		<div class="modal-body">
	      			<form class="poll-form" action="Polls/vote.php" method="post">
						<div class="poll-image">
							Poll Image:<br>
							<div class="image-upload">
								<center>
									<i id="add-image-poll" class="fa fa-plus-circle fa-4x" style="color: gray;"></i>
								</center>
							</div>
						</div>

	      				<h4>Options: </h4>
						<div class="possible_answers" id="poll_modal_answers">
						</div>
						<input type="submit" value="Submit Vote" class="poll-vote-button">
					</form>

	      		</div>
	      		<div class="modal-footer" >
	        		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div>

</div>