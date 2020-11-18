<?php

$errors = [];

if (!array_key_exists('name', $_POST) || empty($_POST['name'])) {
	# code...
	$errors['name'] = "Vous n'avez pas renseigner votre nom.";
}

if (!array_key_exists('email', $_POST) || empty($_POST['email'])) {
	# code...
	$errors['email'] = "Vous n'avez pas renseigner votre email.";
}

if (!array_key_exists('message', $_POST) || empty($_POST['message'])) {
	# code...
	$errors['message'] = "Vous n'avez pas renseigner votre message.";
}


if (!$errors) {
	# code...
	session_start();
	$_SESSION['errors'] = $errors;
	header('location:index.php');
	exit();
}else {
	$message = $_POST['message'];
	$headers = "FROM: site@local.dev";
	mail('contact@local.dev', 'Formulaire de contact', $message, $headers);
}

