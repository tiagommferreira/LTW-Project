<?php
	$user = unserialize($_SESSION['user']);
?>


<div class="title">
<h1>List of Polls</h1>

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
				$all_polls = get_all_public_polls();
				$list_id = $_GET['list_id'];
				$all_list_polls = get_all_list_polls($list_id);
				chdir('../');	// change dir to last dir
				if($all_list_polls!=false){
					foreach($all_list_polls as $poll){

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
	            <td>
	            	<center>
	            		<?php
	            			chdir('Pages/');	// change dir in order to includes work fine
	            			$user_answered_poll = user_answered_poll($user->getID(),$poll->getID());
				            if($user_answered_poll) {
				            	$id = $poll->getID();
				            	echo '<button id="'.$id.'" onclick="pollStatistics(this);" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-pie-chart fa-lg" style="color: #E8D500;"></i></button>';
				            }
				            chdir('../');		
	            		?>
	            		<button id="<?php echo $poll->getID(); ?>" onclick="openVoteModal(this);" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-reply fa-lg"></i></button>
	            	</center>
	            </td>
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

	<div id="poll_vote_modal" class="modal fade">
	 	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        		<h3 id="poll_modal_title" class="modal-title">Modal title</h3>
	      		</div>
	      		<div class="modal-body">
	      			<form class="poll-form" action="Polls/vote.php" method="post">
							
							<div id="poll_view_image" class="image-upload">
								<center>
									<img id="preview" class="rounded-image"/>
								</center>
							</div>

	      				<h4>Options: </h4>
						<div class="possible_answers" id="poll_modal_answers">
						</div>
						
								
	      		</div>
	      		<div class="modal-footer" >
	      			<input type="submit" value="Submit Vote" class="btn btn-success">
	        		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      		</div>
	      		</form>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div>



</div>