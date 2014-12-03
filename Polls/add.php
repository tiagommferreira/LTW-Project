<?php
	session_start(); 

	include '../Models/User.php';
	include '../Models/Poll.php';	// include User model
    $user = unserialize($_SESSION['user']);
    
	$question = htmlentities($_POST['poll_question']);
	$answers = array();
	$counter = 1;
	while(isset($_POST['option_'.$counter])){
		$answer = htmlentities($_POST['option_'.$counter]);
		array_push($answers, $answer);
		$counter++;
	}


	// Pasta onde o arquivo vai ser salvo
	$_UP['folder'] = 'uploads/';

	$location = "";

	if($_FILES['poll_image']['name']!=""){
		// Mantém o nome original do arquivo
		$final_name = htmlentities($_FILES['poll_image']['name']);
		$location = "../".$_UP['folder'];

		if(is_dir($location))
	  	{
	  		echo ("file is a directory");
	  	}else{
	  		mkdir($location,0777);
	  	}

		// Depois verifica se é possível mover o arquivo para a pasta escolhida
		if (move_uploaded_file($_FILES['poll_image']['tmp_name'], $location . $final_name)) {
			// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			echo "Upload efetuado com sucesso!";
			echo '<br /><a href="' . $_UP['folder'] . $final_name . '">Clique aqui para acessar o arquivo</a>';
		} else {
			// Não foi possível fazer o upload, provavelmente a pasta está incorreta
			echo "Não foi possível enviar o arquivo, tente novamente";
		}
	}



	$poll = new Poll;
	$poll->setQuestion($question);
	$poll->setAnswers($answers);
	if($location==""){
		$poll->setImage($location);	
	}else{
		$poll->setImage($_UP['folder'] . $final_name);	
	}
	$poll->setUserID($user->getID());
	$poll->setAnswersReceived(0);

	if(isset($_POST['checkbox'])) {
  		$poll->setPrivate(1);
	}
	else {
		$poll->setPrivate(0);
	}



	if($poll->save() == true){
		echo '<script>alert("Poll added successfully!")</script>';
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=createpoll">';
	}else{
		echo '<script>alert("Poll creation failed!")</script>';
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php">';
	}



?>