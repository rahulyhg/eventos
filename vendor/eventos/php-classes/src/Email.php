<?php

	namespace Eventos;

	use  PHPMailer\PHPMailer\PHPMailer ;
	use  PHPMailer\PHPMailer\Exception ;

	require_once(__dir__."/vendor/autoload.php"); 

	class Email
	{
		private $email;
		
		function __construct()
		{
			$email = new PHPMailer();
		}
	}