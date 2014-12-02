<?php
	$user = unserialize($_SESSION['user']);
	chdir('Pages/');
	include '../database/manage_database.php';
?>

<div class="title">
<h1>Welcome <?php echo $user->getUsername(); ?></h1>

</div>

<div class="content">
	
	<div class="info-box info-box-blue">
		<div class="header">
			<h1>Polls Created</h1>
		</div>
		<div class="body">

			<?php
				//chdir('Pages/');	// change dir in order to includes work fine
				$all_polls = get_all_polls_by_user($user->getID());
				chdir('../');	// change dir to last dir
			?>
			<center>
			<div class="number">
				<?php echo count($all_polls); ?>
			</div>
			</center>
		</div>
	</div>

	<div class="info-box info-box-blue">
		<div class="header">
			<h1>Polls Answered</h1>
		</div>
		<div class="body">
			<?php
				chdir('Pages/');	// change dir in order to includes work fine
				$answered_polls = get_all_answered_polls_by_user($user->getID());
				//$answered_polls = 5;
				chdir('../');	// change dir to last dir
			?>
			<center>
			<div class="number">
				<?php echo $answered_polls ?>
			</div>
			</center>
		</div>
	</div>

	<div class="info-box info-box-blue">
		<div class="header">
			<h1>Polls Unanswered</h1>
		</div>
		<div class="body">
			<?php
				chdir('Pages/');	// change dir in order to includes work fine
				$unanswered_polls = get_all_unanswered_polls_by_user($user->getID());
				chdir('../');	// change dir to last dir
			?>
			<center>
			<div class="number">
				<?php echo $unanswered_polls ?>
			</div>
			</center>
		</div>
	</div>
</div>