<?php
	session_start();
	
	include '../Models/User.php';
	include '../Models/Poll.php';	// include User model
    include '../database/manage_database.php';

    $user = unserialize($_SESSION['user']);

    if (isset($_POST['callCheckPrivate'])) {
		checkPrivate($_POST['callCheckPrivate']);
	}
	else {
		$question = htmlentities($_POST['poll_question']);
		$image_name_html = $_POST['poll_image_name'];
		
		$answers = array();
		$counter = 1;

		$poll_id = $_POST['poll_id'];



		// Pasta onde o arquivo vai ser salvo
		$_UP['folder'] = 'uploads/';

		$location = "";
		if($_FILES['poll_image']['name']!=""){
			// Mantém o nome original do arquivo
			$final_name = htmlentities($_FILES['poll_image']['name']);
			$location = "../".$_UP['folder'];

			if(is_dir($location))
		  	{
		  		echo ("$file is a directory");
		  	}else{
		  		mkdir($location,0777);
		  	}

			// Depois verifica se é possível mover o arquivo para a pasta escolhida
			if (move_uploaded_file($_FILES['poll_image']['tmp_name'], $location . $final_name)) {
				// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
				echo "Upload efetuado com sucesso!";
				echo '<br /><a href="' . $_UP['folder'] . $final_name . '">Clique aqui para acessar o arquivo</a>';
				$location = $_UP['folder'] . $final_name;

			} else {
				// Não foi possível fazer o upload, provavelmente a pasta está incorreta
				echo "Não foi possível enviar o arquivo, tente novamente";
			}
		}else{
			if($image_name_html == ""){
				$location ="";
			}else{
				$location = $image_name_html;
			}
		}
		echo $image_name_html;


		while(isset($_POST['option_'.$counter])){
			$answer = htmlentities($_POST['option_'.$counter]);
			array_push($answers, $answer);
			$counter++;
		}




		if($counter < 3) {
			echo '<script>alert("Poll creation failed. You must have at leat 2 options!")</script>';
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=managepoll">';
		}
		else {
			$poll = get_poll_by_id($poll_id);
			$poll->delete();
			$poll->setQuestion($question);
			$poll->setAnswers($answers);
			$poll->setImage($location);
			$poll->setUserID($user->getID());
			$poll->setAnswersReceived(0);

			if(isset($_POST['checkbox'])) {
	  			$poll->setPrivate(1);
			}
			else {
				$poll->setPrivate(0);
			}

			if($poll->save() == true){
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=managepoll">';
				echo '<script>alert("Poll edited successfully!")</script>';
			}else{
				echo '<script>alert("Poll creation failed!")</script>';
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=managepoll">';
			}

		}
	}
	function checkPrivate($poll_id) {
		$poll = get_poll_by_id($poll_id);
		echo $poll->getPrivate();
	}

?>