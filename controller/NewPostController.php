<?php
include "DatabaseConnection.php";

//Controller responsável pela postagem no banco

$conteudo = $_POST['conteudo'];
$id_marca = $_POST['id_marca'];
$id_vestuario = $_POST['id_vestuario'];
$id_loja =  $_POST['id_loja'];
$data_postagem = date ( 'Y-m-d');

//Insere os registros na tabela postagens
$sql = "INSERT INTO postagens";
$sql = $sql . "(conteudo, ";
$sql = $sql . "id_marca, ";
$sql = $sql . "id_vestuario, ";
$sql = $sql . "id_loja, ";
$sql = $sql . "data_postagem, ";
$sql = $sql . "ativa) ";

$sql = $sql . "VALUES('$conteudo', ";
$sql = $sql . "'$id_marca', ";
$sql = $sql . "'$id_vestuario', ";
$sql = $sql . "'$id_loja', ";
$sql = $sql . "'$data_postagem', ";
$sql = $sql . "'1') ";
mysql_query($sql, $conexao);
mysql_close($conexao);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Shareprice - Nova postagem</title>
</head>
<body>
<h1>Postagem efetuada com sucesso!</h1>	
</body>
</html>