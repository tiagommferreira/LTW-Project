
<div class="title">
<h1>Create Poll</h1>

</div>

<div class="content">
	<form class="poll-form" action="#" method="post">
		<div class="poll-question">
			Question: 
			<input type="text" name="poll_question" class="poll-form-input" placeholder="Write your question...">
		</div>
		<div class="poll-image">
			Poll Image:<br>
			<div class="image-upload">
				<center>
					<i id="add-image-poll" class="fa fa-plus-circle fa-4x" style="color: gray;"></i>
				</center>
			</div>
		</div>
		<br><br>
		Answers:
		<div class="possible_answers">
			<input type="text" name="option_1" class="poll-option" placeholder="Write your answer..."><br>
    		<input type="text" name="option_2" class="poll-option" placeholder="Write your answer..."><br>
		</div>
		<div class="plus-button">
			<i id="add-answer" class="fa fa-plus-circle fa-lg" style="color: #069;"></i>
		</div>
		<input type="submit" value="Create Poll" class="poll-create-button">
	</form>
</div>