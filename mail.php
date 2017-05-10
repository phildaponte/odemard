<?php

	/*
		The Send Mail php Script for Contact Form
		Server-side data validation is also added for good data validation.
	*/

	$data['error'] = false;

	$name = $_POST['name'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	if( empty($name) ){
		$data['error'] = 'Veuillez entrer votre Nom';
	}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		$data['error'] = 'Veuillez entrer votre adresse Mail';
	}else if( empty($subject) ){
		$data['error'] = 'Veuillez remplir ce champ ';
	}else if( empty($message) ){
		$data['error'] = 'Veuillez remplir ce champ';
	}else{

		$formcontent="From: $name\nSubject: $subject\nEmail: $email\nTelephone: $telephone\nMessage: $message";


		//Place your Email Here
		$recipient = "info@raphael.fitness";

		$mailheader = "From: $email \r\n";

		if( mail($recipient, $name, $formcontent, $mailheader) == false ){
			$data['error'] = 'Désolé, une erreur est survenue !';
		}else{
			$data['error'] = false;
		}

	}

	echo json_encode($data);

?>
