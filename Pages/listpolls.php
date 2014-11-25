<?php
	session_start(); 
	$user = unserialize($_SESSION['user']);
?>


<div class="title">
<h1>Polls List</h1>

</div>

<div class="content">
	

	<table id="polls_list" class="polls_list">
	    <thead>
	        <tr>
	            <th>Question</th>
	            <th>Number of Options</th>
	            <th>Number of Answers</th>
	            <th>Created by</th>
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
        </tr>

        <?php
        	}
		}
		?>
        
    </tbody>
</table>


<script type="text/javascript">
	$(document).ready( function () {
    $('#polls_list').DataTable();
} );
</script>

</div>