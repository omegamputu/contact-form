<?php
require '_inc.php';
$errors = [];
$emails = ['contact@local.dev', 'depanage@local.dev'];

$validator = new Validator($_POST);

$validator->check('name', 'required');
$validator->check('email', 'required');
$validator->check('email', 'email');
$validator->check('objet', 'in', array_keys($emails));
$validator->check('message', 'required');

$errors = $validator->errors();

session_start();

if (!empty($errors)) {
	# code...
	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;
	header('location:index.php');
	exit();
}else {
	$form = new Form();
	$form->checkCsrf();
	$_SESSION['success'] = "Votre email a bien été envoyé.";
	$message = $_POST['message'];
	$headers = "FROM: " . $_POST['email'];
	mail($emails[$_POST['objet']], 'Formulaire de contact de ' . $_POST['name'], $message, $headers);
	header('location:index.php');
	die();
}

