<?php

	namespace Eventos\Model;

	use Eventos\DB\Sql;

	class Admin
	{
		private $sql;

		function __construct()
		{
			$this->sql = new Sql();
		}

		public static function verifyLogin()
		{
			if (
					!isset($_SESSION['login']) ||
					$_SESSION['login'] === null  ||
					!(int)$_SESSION['login']['cod_administrador'] > 0
				) {
					header('Location: /login-admin?2');
					exit;
				}
		}
		
		public function createAccount($params = array())
		{
			$rowQueryInsert = "INSERT INTO c_administrador VALUES( DEFAULT, :NOME, :EMAIL, :SENHA, :ULTIMO_ACESSO)";
			$rowQuerySelect = "SELECT * FROM c_administrador WHERE email = :EMAIL";
			$email = [':EMAIL' => $params[':EMAIL']] ;
			$result = $this->sql->select( $rowQuerySelect, $email);
			if($result){
				return 2;
			} else {
				$response = $this->sql->query( $rowQueryInsert, $params);
				if ($response) { return 1; } else { return 0; }
			}
		}

		public function login($email = array(), $senha)
		{
			$rowQuerySelect = "SELECT * FROM c_administrador where email = :EMAIL";
			$result = $this->sql->select( $rowQuerySelect, $email);
			if ($result) {
				$_SESSION['login'] = $result[0];	
			} else {
				header('Location: /login-admin?0');
				exit;
			}
			
			if (sha1($senha) === $_SESSION['login']['senha']) {
				$rowQueryUpdate = "UPDATE c_administrador SET ultimo_acesso = now() WHERE cod_administrador = :COD_ADMINISTRADOR";
				$params = [ ':COD_ADMINISTRADOR' => $_SESSION['login']['cod_administrador']];
				$this->sql->query( $rowQueryUpdate, $params);
				return true;
			} else {
				return false;
			}
		}

		public function registerAddress($datas = array())
		{
			$rowQueryInsert = "INSERT INTO c_endereco VALUES( DEFAULT, :NUMERO, :RUA, :BAIRRO, :CIDADE, :ESTADO, :PAIS)";
			$response = $this->sql->query( $rowQueryInsert, $datas);
			if ($response) { return 1; } else { return 0; }
		}

		public function listAddress()
		{
			$rowQuerySelect = "SELECT cod_endereco, numero, rua, bairro, cidade, estado, pais FROM c_endereco";
			$result = $this->sql->select( $rowQuerySelect);
			if ($result) {
				return $result;	
			} else {
				return ['response' => 'Sem endereços cadastrados'];
			}			
		}

		public function createEvent( $datas = array() )
		{
			$rowQueryInsert = "INSERT INTO c_evento VALUES( DEFAULT, :DESCRICAO_EVENTO, :DATA_REALIZACAO, :COD_ADMINISTRADOR, :COD_ENDERECO)";
			$response = $this->sql->query( $rowQueryInsert, $datas);
			if ($response) { return 1; } else { return 0; }
		}

		public function updateEvent( $datas = array())
		{
			$rowQueryUpdate = "UPDATE c_evento SET descricao_evento = :DESCRICAO_EVENTO, data_realizacao = :DATA_REALIZACAO, cod_endereco = :COD_ENDERECO WHERE cod_evento = :COD_EVENTO";
			$response = $this->sql->query( $rowQueryUpdate, $datas);
			if ($response) { return 1; } else { return 0; }
		}

		public function listEvents($param = array())
		{
			$rowQuerySelect = "SELECT cod_evento, descricao_evento FROM c_evento WHERE cod_administrador = :COD_ADMINISTRADOR";
			$result = $this->sql->select( $rowQuerySelect, $param);
			if ($result) {
				return $result;	
			} else {
				return ['response' => 'Sem eventos cadastrados'];
			}				
		}

		public function searchEvent($cod)
		{
			$rowQuerySelect = "SELECT e.cod_evento, e.descricao_evento, e.data_realizacao, e.cod_administrador, e.cod_endereco, en.numero, en.rua, en.bairro, en.cidade, en.estado, en.pais FROM c_evento AS e INNER JOIN c_endereco AS en ON e.cod_endereco = en.cod_endereco WHERE cod_evento = :COD";
			$param = [ ':COD' => $cod];
			$result = $this->sql->select( $rowQuerySelect, $param);
			if ($result) {
				return $result;	
			} else {
				return ['response' => 'Sem eventos cadastrados'];
			}				
		}

		public function listParticipants($cod_administrador)
		{
			$rowQuerySelect = "SELECT p.cod_participante, p.nome, p.email FROM c_registro r INNER JOIN c_participante p ON r.cod_participante = p.cod_participante WHERE cod_evento = :COD_EVENTO";
			$param = [ ':COD_EVENTO' => $cod_administrador];
			$result = $this->sql->select( $rowQuerySelect, $param);
			if ($result) {
				return $result;
			} else {
				return [ 'cod_participante' => '0','nome' => 'Sem Nome', 'email' => 'Sem Email'];
			}
		}		

	}