<?php
	$user = unserialize($_SESSION['user']);
	include_once('Models/Poll.php');
	include_once('Models/User.php');

	chdir('Pages/');	// change dir in order to includes work fine
	include '../database/manage_database.php';
	
	$poll = get_poll_by_id($_GET['poll_id']);
	chdir('../');	// change dir to last dir
	
	$curr_url = 'http://ltw.feup:8888/projetoLTW/user.php?page=viewpoll%26poll_id='; 

?>




<div class="title">
<h1><?php echo $poll->getQuestion(); ?></h1>
</div>



<div class="content">
	<form class="poll-form" action="Polls/vote.php" method="post">
							
		<div id="poll_view_image" class="image-upload">
			<center>
				<img id="preview" class="rounded-image" src="<?php echo $poll->getImage(); ?>"/>
			</center>
		</div>
		
		<div class="possible_answers" id="poll_modal_answers">

			<?php 
				$answers = $poll->getAnswers();
				echo count($answers);

				for($i = 0; $i < count($answers); $i++){
					?>
					<input type="radio" name="option" value="<?php echo $answers[$i]; ?>"> 
					<?php
						chdir('Pages/');	// change dir in order to includes work fine
						include_once '../database/manage_database.php';
						$answer_string = get_answer_by_id($answers[$i]);
						chdir('../');	// change dir to last dir

						echo $answer_string['answer'];
					?>
					
					<br>


					<?php
				}
			?>
		</div>


		<div id="share">
			<div id="share-fb">
 				<div class="fb-share-button" data-href="<?php echo $_SERVER['REQUEST_URI']; ?>" data-layout="button"></div>
 			</div>
 			<div id="share-twitter">
				<a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>
			<div id="share-email">
				<a href="mailto:?subject=Poll&amp;body=<?php echo $curr_url . $poll->getID(); ?>%0D%0DPlease, complete this poll! This will just take a few seconds and will help to get a better statistical result." title="Share by Email"><img src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png"/></a>
			</div>
		</div>
	
					

  		</div>
  		<div class="modal-footer" >
  			<input type="submit" value="Submit Vote" class="btn btn-success">
    		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
  		</div>
  		</form>

</div>
