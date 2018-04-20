<?php

	session_start();

	require_once("vendor/autoload.php");

	use \Slim\Slim;
	use \Eventos\Page;
	use \Eventos\Model\Admin;
	use \Eventos\Model\User;
	use \Eventos\DB\Sql;

	$app = new Slim();

	$app->config( 'debug', true);

	$app->get( '/', function ()
	{
		$page = new Page();
		$files = [ 'header', 'index', 'footer'];
		$page->drawPage( $files);
	});


	$app->get( '/create-admin', function ()
	{
		$page = new Page();
		$files = [ 'header', 'create-admin', 'footer'];
		$page->drawPage( $files);
	});

	$app->post( '/create-admin', function ()
	{
		$admin = new Admin();
		$result = $admin->createAccount( [ ':NOME' => $_POST['nome'], ':EMAIL' => $_POST['email'], ':SENHA' => sha1($_POST['senha']), ':ULTIMO_ACESSO' => '2000/01/01']);
		header('Location: /eventos/create-admin?'.$result);
		exit;
	});

	$app->get( '/login-admin', function ()
	{
		$page = new Page();
		$files = [ 'header', 'login-admin', 'footer'];
		$page->drawPage( $files);
	});

	$app->post( '/login-admin', function ()
	{
		$admin = new Admin();
		$response = $admin->login( [ ':EMAIL' => $_POST['email']], $_POST['senha']);
		if ($response) {
			header('Location: /eventos/admin');
			exit;			
		} else {
			header('Location: /eventos/login-admin?0');
			exit;			
		}
	});

	$app->get( '/admin', function ()
	{
		Admin::verifyLogin();
		$page = new Page();
		$files = [ 'header', 'navbar', 'home-admin', 'footer'];
		$params = $_SESSION['login'];
		$page->drawPage( $files, $params);
	});

	$app->get( '/logout-admin', function ()
	{
		$_SESSION['login'] = null;
		header('Location: /eventos/login-admin');
		exit;
	});

	$app->get( '/admin/register-address', function ()
	{
		Admin::verifyLogin();
		$page = new Page();
		$files = [ 'header', 'navbar', 'register-address', 'footer'];
		$page->drawPage( $files);
	});

	$app->post( '/admin/register-address', function ()
	{
		Admin::verifyLogin();
		$admin = new Admin();
		$params = [ ':NUMERO' => $_POST['numero'], ':RUA' => $_POST['rua'], ':BAIRRO' => $_POST['bairro'], ':CIDADE' => $_POST['cidade'], ':ESTADO' => $_POST['estado'], ':PAIS' => $_POST['pais']];
		$result = $admin->registerAddress($params);
		header('Location: /eventos/admin/register-address?'.$result);
		exit;
	});	

	$app->get( '/admin/create-event', function ()
	{
		Admin::verifyLogin();
		$admin = new Admin();
		$result = $admin->listAddress();
		$address = [ 'address' => $result];
		$page = new Page();
		$files = [ 'header', 'navbar', 'create-event', 'footer'];
		$page->drawPage( $files, $address);
	});

	$app->post( '/admin/create-event', function ()
	{
		Admin::verifyLogin();
		$admin = new Admin();
		$data_realizacao = $_POST['data-realizacao']." ".$_POST['horario'];
		$params = [ ':DESCRICAO_EVENTO' => $_POST['nome-evento'], ':DATA_REALIZACAO' => $data_realizacao, ':COD_ADMINISTRADOR' => $_SESSION['login']['cod_administrador'], ':COD_ENDERECO' => $_POST['endereco']];
		$result = $admin->createEvent($params);
		header('Location: /eventos/admin/create-event?'.$result);
		exit;
	});

	$app->get( '/admin/events-list', function ()
	{
		Admin::verifyLogin();
		$admin = new Admin();
		$cod_administrador = [':COD_ADMINISTRADOR' => $_SESSION['login']['cod_administrador']];
		$result = $admin->listEvents($cod_administrador);
		$events = [ 'events' => $result];
		$page = new Page();
		$files = [ 'header', 'navbar', 'events-list', 'footer'];
		$page->drawPage( $files, $events);
	});	

	$app->get( '/admin/event/:id', function ($id)
	{
		Admin::verifyLogin();
		$admin = new Admin();
		$result = $admin->searchEvent($id);
		$_SESSION['events'] = $result[0];
		$_SESSION['events']['cod_event'] = $id;
		header('Location: /eventos/admin/index-event');
		exit;
	});

	$app->get( '/admin/index-event', function ()
	{
		Admin::verifyLogin();
		$date = new DateTime($_SESSION['events']['data_realizacao']);
		$_SESSION['events']['data_temp'] = preg_replace( '/-/', '/', $date->format('d-m-Y H:i:s'));		
		$event = [ 'event' => $_SESSION['events']];
		$page = new Page();
		$files = [ 'header', 'navbar', 'event', 'footer'];
		$page->drawPage( $files, $event);

	});

	$app->get( '/admin/alter-event', function ()
	{
		Admin::verifyLogin();
		$admin = new Admin();
		$resultAddress = $admin->listAddress();
		$_SESSION['events']['hora'] = substr( $_SESSION['events']['data_realizacao'], 11);
		$_SESSION['events']['data'] = substr( $_SESSION['events']['data_realizacao'], 0, 10);
		$listDatas = [ 'address' => $resultAddress, 'event' => $_SESSION['events']];
		$page = new Page();
		$files = [ 'header', 'navbar', 'alter-event', 'footer'];
		$page->drawPage( $files, $listDatas);
	});

	$app->post( '/admin/alter-event', function ()
	{
		$data_realizacao = $_POST['data-realizacao']." ".$_POST['horario'];
		$params = [ ':DESCRICAO_EVENTO' => $_POST['nome-evento'], ':DATA_REALIZACAO' => $data_realizacao, ':COD_ENDERECO' => $_POST['endereco'], ':COD_EVENTO' => $_SESSION['events']['cod_event']];
		echo json_encode($params);
		$admin = new Admin();
		$result = $admin->updateEvent($params);
		header('Location: /eventos/admin/index-event?'.$result);
		exit;
	});

	$app->get( '/admin/list-of-participants', function ()
	{
		$admin = new Admin();
		$result = $admin->listParticipants($_SESSION['events']['cod_event']);
		$listParticipants = [ 'listParticipants' => $result];
		$page = new Page();
		$files = [ 'header', 'navbar', 'list-of-participants', 'footer'];
		$page->drawPage( $files, $listParticipants);
	});				

	$app->get( '/participant-session', function ()
	{
		$page = new Page();
		$files = [ 'header', 'participant-session', 'footer'];
		$page->drawPage( $files);
	});

	$app->get( '/subscription', function ()
	{
		$user = new User();
		$result = $user->listEvents();
		$events = [ 'events' => $result];
		$page = new Page();
		$files = [ 'header', 'subscription', 'footer'];
		$page->drawPage( $files, $events);
	});

	$app->post( '/subscription', function ()
	{
		$user = new User();
		$result = $user->registerForTheEvent($_POST);
		if ($result) {

			$mail = new PHPMailer;

			$mail->isSMTP();

			$mail->SMTPOptions = array(
		        'ssl' => array(
		            'verify_peer' => false,
		            'verify_peer_name' => false,
		            'allow_self_signed' => true
		        )
		    );

			$mail->SMTPDebug = 2;

			$mail->Host = 'smtp.gmail.com';

			$mail->Port = 587;

			$mail->SMTPSecure = 'tsl';

			$mail->SMTPAuth = true;

			$mail->Username = "eventosliberato@liberato.com.br";

			$mail->Password = "3v3nt0sl1b3t3c4";

			$mail->setFrom('vitorhugooliveira64@gmail.com', 'Vitor Hugo Balon de Oliveira');

			// Definir um endereço de resposta alternativo
			//$mail->addReplyTo('vitorhugooliveira64@gmail.com', 'Vitor Hugo Oliveira');

			$mail->addAddress('vitorhugooliveira64@gmail.com', 'vitorhugooliveira64@gmail.com');

			$mail->Subject = 'Confirmação de cadastro!';

			$mail->msgHTML(file_get_contents('views/email-body.html'), __DIR__);

			$mail->AltBody = 'Erro No Corpo Do Texto!';

			// Anexe um arquivo de imagem
			//$mail->addAttachment('images/phpmailer_mini.png');

			if (!$mail->send()) {
			    echo "Erro De Envio: " . $mail->ErrorInfo;
			} else {
			    echo "Email Enviado!";

			}

			function save_mail($mail)
			{
			    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

			    $imapStream = imap_open($path, $mail->Username, $mail->Password);

			    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
			    imap_close($imapStream);

			    return $result;
			}			
		}		
		// header('Location: /eventos/subscription?'.$result);
		// exit;
	});

	/*




	$app->get( '/login-certificate', function ()
	{
		$page = new Page();
		$files = [ 'header', 'login-certificate', 'footer'];
		$page->drawPage( $files);
	});

	$app->get( '/certificates', function ()
	{
		$page = new Page();
		$files = [ 'header', 'certificates', 'footer'];
		$page->drawPage( $files);
	});

	$app->get( '/nav', function ()
	{
		$page = new Page();
		$files = [ 'header', 'navbar', 'footer'];
		$page->drawPage( $files);
	});



	*/	

	$app->run();

?>