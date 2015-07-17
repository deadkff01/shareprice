<?php

Class Conexao{
	private $host = "localhost";
	private $user = "postgres";
	private $pswd = "senacrs";
	private $banco;
	private $strCon;
	private $con;

	function Conexao ($banco){
		$this->banco = $banco;
		$this->strCon = "host=$this->host user=$this->user password=$this->pswd dbname=$this->banco";
	}

	function Open(){
		$this->con = @pg_connect($this->strCon);
	}
	
	function Close(){
		pg_close($this->con);
	}

	function StatusCon(){
		if($this->con){
			echo 'conectado';
		}
		else{
			echo 'desconectado';
			exit;
		}
	}
	
	}

?>