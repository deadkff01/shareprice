<?php
include "DatabaseConnection.php";

//Controller responsável pela postagem no banco

$conteudo = isset($_POST['conteudo']) ? $_POST['conteudo'] : '';
$id_marca = isset($_POST['id_marca']) ? $_POST['id_marca'] : '';
$id_vestuario = isset($_POST['id_vestuario']) ? $_POST['id_vestuario'] : '';
$id_loja =  isset($_POST['id_loja']) ? $_POST['id_loja'] : '';
$id_valor =  isset($_POST['id_valor']) ? $_POST['id_valor'] : '';
$foto = $_FILES["foto"];
$data_postagem = date ( 'Y-m-d');
$tamanho = 4000000;

// Verifica se o arquivo é uma imagem de formato aceito
	if(!preg_match("/^image\/(jpg|jpeg|png)$/", $foto["type"])){
   	$error[1] = "Favor enviar arquivos no formato .jpg ou .png";
   	}

 // Verifica se o tamanho da imagem é maior que o tamanho permitido
	if($foto["size"] > $tamanho) {
   	$error[2] = "A imagem deve ter no máximo ".$tamanho." bytes";
	}

   	if (count(@$error) == 0) {
		//Pega a extensão da foto
		preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"], $ext);
		//Nome unico gerado para a imagem
		$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
		// Caminho de onde ficará a imagem
		$caminho_imagem = "../imagem/" . $nome_imagem;
		// Faz o upload da imagem para seu respectivo caminho
		move_uploaded_file($foto["tmp_name"], $caminho_imagem);

		//Insere os registros na tabela postagens
		$sql = "INSERT INTO postagens";
		$sql = $sql . "(caminho_imagem, ";
		$sql = $sql . "conteudo, ";
		$sql = $sql . "id_marca, ";
		$sql = $sql . "id_vestuario, ";
		$sql = $sql . "id_loja, ";
		$sql = $sql . "id_valor, ";
		$sql = $sql . "data_postagem, ";
		$sql = $sql . "ativa) ";
		
		$sql = $sql . "VALUES('$caminho_imagem', ";
		$sql = $sql . "'$conteudo', ";
		$sql = $sql . "'$id_marca', ";
		$sql = $sql . "'$id_vestuario', ";
		$sql = $sql . "'$id_loja', ";
		$sql = $sql . "'$id_valor', ";
		$sql = $sql . "'$data_postagem', ";
		$sql = $sql . "'1') ";
		mysql_query($sql, $conexao);
		mysql_close($conexao);

		echo "Postagem cadastrada com sucesso!";
	}

	if (count(@$error) != 0) {
			foreach ($error as $erro) {
				echo $error . "<br />";
			}
	}
?>