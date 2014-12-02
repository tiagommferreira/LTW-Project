<?php
	$user = unserialize($_SESSION['user']);

	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
?>


<div class="title">
<h1>Create Polls List</h1>
</div>

<div class="content">

	<form action="Polls/createlist.php" method="post"  enctype="multipart/form-data">
		<input type="text" name="list_name" class="poll-form-input" placeholder="List name" required>
		<br><br><br>
						
		<table id="manage_polls_list" class="table table-striped table-hover">
		    <thead>
		        <tr>
		            <th><center>Question</center></th>
		            <th><center>Number of Options</center></th>
		            <th><center>Number of Answers</center></th>
		            <th><center>Private</center></th>
		            <th><center>Preview</center></th>
		            <th><center>Add</center></th>
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

						<?php if($poll->getPrivate() == true){
							echo '<p style="display:none">1</p><i class="fa fa-check fa-lg" style="color: green;"></i>';
						}else{
							echo '<p style="display:none">0</p><i class="fa fa-times fa-lg" style="color: red;"></i>';
						}
						?>
		            </center></td>
		            <td><center>
		            <a href="user.php?page=viewpoll&poll_id=<?php echo $poll->getID(); ?>" target="_blank"><i class="fa fa-arrows-alt fa-lg" style="color: gray;"></i></a></center></td>


		            <td><center>
		            	<input type="checkbox" name="poll[]" value="<?php echo $poll->getID(); ?>">
		            </center></td>
		        	
		        
		        </tr>

		        <?php
		        	}
				}
				?>
		        
		    </tbody>
		</table>
		<div class="modal-footer" >
  			<input type="submit" value="Create List" class="btn btn-success">
	    </div>

	</form>



</div>