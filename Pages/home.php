<?php
	session_start(); 
	$user = unserialize($_SESSION['user']);
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
				chdir('Pages/');	// change dir in order to includes work fine
				include '../database/manage_database.php';
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
			<center>
			<div class="number">
				number here
			</div>
			</center>
		</div>
	</div>


	<div class="info-box info-box-blue">
		<div class="header">
			<h1>Polls Answered</h1>
		</div>
		<div class="body">
			<center>
			<div class="number">
				number here
			</div>
			</center>
		</div>
	</div>
</div>