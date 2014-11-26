<?php
	session_start(); 
	$user = unserialize($_SESSION['user']);
?>


<div class="title">
<h1>Polls List</h1>

</div>

<div class="content">

	<table id="polls_list" class="table table-striped table-hover">
	    <thead>
	        <tr>
	            <th><center>Question</center></th>
	            <th><center>Number of Options</center></th>
	            <th><center>Number of Answers</center></th>
	            <th><center>Created by</center></th>
	            <th><center>Vote</center></th>
	        </tr>
	    </thead>
	    <tbody>
			<?php
				chdir('Pages/');	// change dir in order to includes work fine
				include '../database/manage_database.php';
				$all_polls = get_all_polls();
				chdir('../');	// change dir to last dir
				if($all_polls!=false){
					foreach($all_polls as $poll){

			?>

	       	<tr> 
	            <td><center><?php echo $poll->getQuestion(); ?> </center></td>
	            <td><center><?php echo count($poll->getAnswers()); ?> </center></td>
	            <td><center><?php echo $poll->getAnswersReceived(); ?> </center></td>

	            <td><center>
	            <?php 
	            chdir('Pages/');	// change dir in order to includes work fine
	            $user_poll = get_user_by_id($poll->getUserID());
	            echo $user_poll->getUsername();
	            chdir('../');	// change dir in order to includes work fine
	            ?> 
	            </center></td>
	            <td><center><button id="<?php echo $poll->getID(); ?>" onclick="openVoteModal(this);" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-reply fa-lg"></i></button></center></td>
	        </tr>

	        <?php
	        	}
			}
			?>
	        
	    </tbody>
	</table>

	<div id="poll_vote_modal" class="modal fade">
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


<script type="text/javascript">
	
</script>

</div>