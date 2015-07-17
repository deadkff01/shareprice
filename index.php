<?php
	include 'classes/conexao.class.php';
	$conexao = new Conexao('shareprice');
	$conexao->Open();
	$conexao->StatusCon();
?>