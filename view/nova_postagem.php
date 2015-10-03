<?php
include "header.php";
include "../controller/DatabaseConnection.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Shareprice - Nova postagem</title>
<!-- Função que valida os campos digitados pelo usuario-->
<script language="javascript">
	function valida_form(){
		if (document.nova_postagem.conteudo.value == ""){
			alert("Por favor, escreva algo sobre essa promoção!");
			nova_postagem.conteudo.focus();
			return false;
		}
		if (document.nova_postagem.id_marca.value == "0"){
			alert("Por favor, selecione uma marca.");
			nova_postagem.id_marca.focus();
			return false;
		}
		if (document.nova_postagem.id_vestuario.value == "0"){
			alert("Por favor, selecione uma tipo de roupa.");
			nova_postagem.id_vestuario.focus();
			return false;
		}
		if (document.nova_postagem.id_loja.value == "0"){
			alert("Por favor, selecione uma loja.");
			nova_postagem.id_loja.focus();
			return false;
		}
		return true;
	}
</script>
</head>
<body>
<p>
Diga algo sobre essa promoção:<br>
<form name ="nova_postagem" action="../controller/NewPostController.php" method="post"
onsubmit="return valida_form(this);">
<textarea name = "conteudo" rows="4" cols="50" ></textarea>
</p>
<p>
<label>Marca:</label>
<select name="id_marca">
	<?php	
	// Carrega combo  de marcas
	$itens_marcas = "<option value='0' >-- Selecione uma marca</option><br/>";
	$sql_marcas = "SELECT * FROM marcas order by nome_marca";
	$rs_marcas = mysql_query($sql_marcas,$conexao);
	while ($reg_marcas = mysql_fetch_array($rs_marcas)){
	$itens_marcas = $itens_marcas . "<option value='" . $reg_marcas['id_marca'] . "'>" . $reg_marcas['nome_marca'] . "</option><br/>";
	}
	print $itens_marcas;
	?>
</select>
</p>
<p>
<label>Tipo de roupa:</label>
<select name="id_vestuario">
	<?php	
	// Carrega combo  de vestuario
	$itens_vestuarios = "<option value='0' >-- Selecione uma marca</option><br/>";
	$sql_vestuarios = "SELECT * FROM vestuarios order by nome_vestuario";
	$rs_vestuarios = mysql_query($sql_vestuarios,$conexao);
	while ($reg_vestuarios = mysql_fetch_array($rs_vestuarios)){
	$itens_vestuarios = $itens_vestuarios . "<option value='" . $reg_vestuarios['id_vestuario'] . "'>" . $reg_vestuarios['nome_vestuario'] . "</option><br/>";
	}
	print $itens_vestuarios;
	?>
</select>
</p>
<p>
<label>Loja:</label>
<select name="id_loja">
	<?php
	// Carrega combo  de lojas
	$itens_lojas = "<option value='0' >-- Selecione uma loja</option><br/>";
	$sql_lojas = "SELECT * FROM lojas order by nome_loja";
	$rs_lojas = mysql_query($sql_lojas,$conexao);
	while ($reg_lojas = mysql_fetch_array($rs_lojas)){
	$itens_lojas = $itens_lojas . "<option value='" . $reg_lojas['id_loja'] . "'>" . $reg_lojas['nome_loja'] . "</option><br/>";
	}
	print $itens_lojas;
	?>
</select>
</p>
<input type = "submit" value = "Postar!">
</form>
</body>
</html>