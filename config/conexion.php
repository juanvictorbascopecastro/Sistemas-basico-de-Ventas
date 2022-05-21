<?php 

//require_once 'global.php';

class Conexion{
	private $conect;

	public function __construct(){
		$connectionsString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";".DB_CHARSET;
		try{
			$this->conect = new PDO($connectionsString, DB_USER, DB_PASSWORD);
			$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			$this->conect = "Error de conexion";
			echo "ERROR: ".$e->getMessage();
		}
	}

	public function connect(){
		return $this->conect;
	}
}

