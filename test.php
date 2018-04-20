<?php

	require_once("vendor/autoload.php");

	use  PHPMailer \ PHPMailer \ PHPMailer ; 
	use  PHPMailer \ PHPMailer \ Exception ;

	use \Eventos\Email;

	$email = new Email();

	echo "Olá";