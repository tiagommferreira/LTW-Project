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
	            	<button id="<?php echo $poll->getID(); ?>" onclick="" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-cogs fa-lg"></i></button>
	            	<button id="<?php echo $poll->getID(); ?>" onclick="" style="border: 0px; background-color: rgba(255,0,0,0.0);"><i class="fa fa-times fa-lg"></i></button>	
	            	</center></td>
	        </tr>

	        <?php
	        	}
			}
			?>
	        
	    </tbody>
	</table>

</div>