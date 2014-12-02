<?php
	$user = unserialize($_SESSION['user']);

	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
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
	            <th><center>Private</center></th>
	            <th><center>Share</center></th>
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
	            <td><center>

	            	<button id="<?php echo $poll->getID(); ?>" onclick="pollStatistics(this);" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-pie-chart fa-lg" style="color: #E8D500;"></i></button>
	            	<button id="<?php echo $poll->getID(); ?>" onclick="editPoll(this)" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-cogs fa-lg" style="color: black;"></i></button>
	            	<button id="<?php echo $poll->getID(); ?>" onclick="deletePoll(this)" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-times fa-lg" style="color: red;"></i></button>		
	            	
	            	</center></td>

	            <td><center>

					<?php if($poll->getPrivate() == true){
						echo '<p style="display:none">1</p><i class="fa fa-check fa-lg" style="color: green;"></i>';
					}else{
						echo '<p style="display:none">0</p><i class="fa fa-times fa-lg" style="color: red;"></i>';
					}
					?>
	            </center></td>
	            <td><center><button id="<?php echo $poll->getID(); ?>" onclick="openShareModal(this)" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-external-link fa-lg"></i></button></center></td>
	        	
	        
	        </tr>

	        <?php
	        	}
			}
			?>
	        
	    </tbody>
	</table>



	
	<div id="poll_share_modal" class="modal fade">
	 	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        		<h3 id="poll_modal_title" class="modal-title">Modal title</h3>
	      		</div>
	      		<div class="modal-body">
					<div class="possible_answers" id="share_url">
						url: <div id="url_string"></div>
					</div>
	      		</div>
	      		<div class="modal-footer" >
	        		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      		</div>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div>


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


	<div id="poll_edit_modal" class="modal fade">
	 	<div class="modal-dialog">
	    	<div class="modal-content">
	    		<form class="poll-form" action="Polls/update.php" method="post"  enctype="multipart/form-data">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        		<input type="text" name="poll_question" class="poll-form-input" placeholder="Write your question...">
						<label>
							<input type="checkbox" name="checkbox[]" class="checkboxPrivate"> Private
						</label>
		      		</div>
		      		<div class="modal-body">
		      			<input type="text" name="poll_id" style="display:none" class="id_poll" id="id_poll">
		      			<input type="text" name="poll_image_name" style="display:none" class="id_poll" id="poll_image_name">
		      			
		      			<div id="image_poll_cre" >
						<center>
							<input id="poll_image" class="image_input_form" type="file" name="poll_image" onchange="fileSelected();" style="background-color: #D6D6D6;">

							<div id="error">You should select valid image files only!</div>
				            <div id="error2">An error occurred while uploading the file</div>
				            <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
				            <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

							<br>Preview:<br>
							<div id="image-preview">
							<div id="image-preview-inbox" class="image-preview" style="margin-bottom: 4%;">
								<center>
									<img id="preview"/>
									<i id="preview-icon" class="fa fa-file-image-o fa-4x" style="color: gray;"></i>
								</center>
							</div>
							</div>
							<a id="clearFileInput" onclick="clearFileInputManage()" class="poll-create-button">
								<i  class="fa fa-minus-circle fa-lg" style="color: red;"></i> Delete Image
							</a>

						</center>
						</div>
						<br>


	      				<h4>Options:</h4>
						<div class="possible_answers_management" id="poll_edit_answers">
						</div>
						<div class="plus-button">
							<i id="add-answer-management" class="fa fa-plus-circle fa-lg" style="color: #069;"></i>
						</div>
						
		      		<div class="modal-footer" >
		      			<p style="color: #FF4400; float: left;"> <i class="fa fa-exclamation-triangle"></i> Editing your poll will reset it.</p>
		      			<input type="submit" value="Finish Editing" class="btn btn-success">
		        		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		      		</div>
		      	</form>
	    	</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div> 

</div>