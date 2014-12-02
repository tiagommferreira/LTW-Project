<?php 
$user = unserialize($_SESSION['user']);
?>
<div class="title">
	<h1>Create Poll</h1>

</div>

<div class="content">
	<form class="poll-form" action="Polls/add.php" method="post" enctype="multipart/form-data">
		<div class="poll-question">
			Question: 
			<input type="text" name="poll_question" class="poll-form-input" placeholder="Write your question..." required>
		</div>
		
		Please select poll image file:
		<div id="image_poll_cre" class="poll-image">

			<input id="poll_image" class="image_input_form" type="file" name="poll_image" onchange="fileSelected();" >

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
			<a id="clearFileInput" onclick="clearFileInput()" class="poll-create-button">
				<i  class="fa fa-minus-circle fa-lg" style="color: red;"></i> Delete Image
			</a>

		</div>
		<br><br><br>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="checkbox[]"> Private
			</label>
		</div>
		<br>
		Answers:
		<div class="possible_answers">
			<input type="text" name="option_1" class="poll-option" placeholder="Write your answer..." required><br>
			<input type="text" name="option_2" class="poll-option" placeholder="Write your answer..." required><br>
		</div>
		<div class="plus-button">
			<i id="add-answer" class="fa fa-plus-circle fa-lg" style="color: #069;"></i>
		</div>
		<input type="submit" value="Create Poll" class="poll-create-button">
	</form>
</div>