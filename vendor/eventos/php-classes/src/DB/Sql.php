<?php

	namespace Eventos\DB;

	use PDO;
	
	class Sql extends PDO
	{
		const HOSTNAME = "172.16.0.5";
		const USERNAME = "site";
		const PASSWORD = "ChWoaTBxTZEzVSHX";
		const DBNAME = "certificados";
		private $con;		
		
		function __construct()
		{
			$this->con = new PDO("mysql:dbname=".Sql::DBNAME."; host=".Sql::HOSTNAME, Sql::USERNAME, Sql::PASSWORD);
		}

		public function testConnection()
		{
			if ($this->con) {
				return true;
			} else {
				return false;
			}
		}

		private function bindParams($statement, $key, $value)
		{
			$statement->bindParam($key, $value);
		}

		private function setParams($statement, $parameters = array())
		{
			foreach ($parameters as $key => $value) {
				$this->bindParams($statement, $key, $value);
			}
		}		

		public function query( $rowQuery, $params = array('' => ''))
		{
			$stmt = $this->con->prepare($rowQuery);
			$this->setParams( $stmt, $params);
			if ($stmt->execute()){ return 1; } else { return 0; }
		}

		public function select( $rowQuery, $params = array('' => ''))
		{
			$stmt = $this->con->prepare($rowQuery);
			$this->setParams( $stmt, $params);
			if ($stmt->execute()){ return $stmt->fetchAll(PDO::FETCH_ASSOC); } else { return 0; }
		}
	}