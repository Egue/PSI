<?php

class modelConnections extends PDO{
	private $tipodb = "mysql";
	private $host = "localhost";
	private $dbname = "SeguridadUsuarios";
	private $username = "root";
	private $password = "";

	public function __construct(){
		//sobreEscribir el metodo Constructor de la clase PDO
		try {
			parent::__construct("{$this->tipodb}:dbname={$this->dbname}; host={$this->host}; charset=utf8", $this->username, $this->password);
		} catch (PDOException $e) {
			echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
		}
	}
}








?>
