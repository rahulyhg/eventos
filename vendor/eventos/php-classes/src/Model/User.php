<?php

	namespace Eventos\Model;
	use Eventos\DB\Sql;

	class User
	{
		private $sql;

		function __construct()
		{
			$this->sql = new Sql();
		}

		public function listEvents()
		{
			$rowQuerySelect = "SELECT cod_evento, descricao_evento FROM c_evento";
			$result = $this->sql->select( $rowQuerySelect);
			if ($result) {
				return $result;	
			} else {
				return ['response' => 'Sem eventos cadastrados'];
			}				
		}

		public function registerForTheEvent($params)
		{
			$rowQueryProcedure = "SELECT inserir_registro( :NOME, :EMAIL, :COD_EVENTO) AS i FROM dual;";
			$datas = [':NOME' => $params['nome'], ':EMAIL' => $params['email'], ':COD_EVENTO' => $params['cod_evento']];
			$response = $this->sql->select( $rowQueryProcedure, $datas);
			$response = $response[0];
			$response = $response['i'];
			if ($response == 2) { return $response; } elseif(!$response) { return 0; } else { return 1; }
		}
	}