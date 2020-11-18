<?php

$errors = [];

if (!array_key_exists('name', $_POST) || empty($_POST['name'])) {
	# code...
	$errors['name'] = "Vous n'avez pas renseigner votre nom.";
}

if (!array_key_exists('email', $_POST) || empty($_POST['email']) || !filter_var($_POST['email'])) {
	# code...
	$errors['email'] = "Vous n'avez pas renseigner un email valide.";
}

if (!array_key_exists('message', $_POST) || empty($_POST['message'])) {
	# code...
	$errors['message'] = "Vous n'avez pas renseigner votre message.";
}

session_start();

if (!empty($errors)) {
	# code...
	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;
	header('location:index.php');
	exit();
}else {
	$_SESSION['success'] = "Votre email a bien été envoyé.";
	$message = $_POST['message'];
	$headers = "FROM: site@local.dev";
	mail('contact@local.dev', 'Formulaire de contact', $message, $headers);
	header('location:index.php');
	die();
}

