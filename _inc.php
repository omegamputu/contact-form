<?php

session_start();

// Token csrf
if (!isset($_SESSION['csrf'])) {
	# code...
	$_SESSION['csrf'] = md5(time() + rand());
}

require 'class/Form.php';
require 'class/Validator.php';