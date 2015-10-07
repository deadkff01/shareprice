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
<title>Shareprice - Enviar promoção</title>
<!-- Função que valida os campos digitados pelo usuario-->
<script language="javascript">
	function valida_campos(){
		
		if (document.nova_postagem.foto.value =="") {
			alert("Por favor, selecione a foto da promoção!");
			nova_postagem.foto.focus();
			return false;
		}
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
		if (document.nova_postagem.id_valor.value == "0"){
			alert("Por favor, selecione uma faixa de preço.");
			nova_postagem.id_valor.focus();
			return false;
		}
		return true;
	}
</script>
</head>
<body>
<div class="col-md-4 col-md-offset-4"> 
<form name ="nova_postagem" action="../controller/NewPostController.php" method="post" enctype="multipart/form-data" onsubmit="return valida_campos(this);">
<div class="form-group">
	<label>Foto da promoção:</label>
	<input type="file" name="foto" class="form-control">
</div>
<div class="form-group">
	Diga algo sobre essa promoção:<br>
	<textarea name = "conteudo" rows="4" cols="50" class="form-control"></textarea>
</div>
<div class="form-group">
	<label>Marca:</label>
	<select name="id_marca" class="form-control">
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
</div>
<div class="form-group">
	<label>Tipo de roupa:</label>
	<select name="id_vestuario" class="form-control">
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
</div>
<div class="form-group">
	<label>Loja:</label>
	<select name="id_loja" class="form-control">
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
</div>
<div class="form-group">
	<label>Faixa de valor:</label>
	<select name="id_valor" class="form-control">
	<?php	
	// Carrega combo  de valores
	$itens_valores = "<option value='0' >-- Selecione uma faixa de valor</option><br/>";
	$sql_valores = "SELECT * FROM valores order by id_valor";
	$rs_valores = mysql_query($sql_valores,$conexao);
	while ($reg_valores = mysql_fetch_array($rs_valores)){
	$itens_valores = $itens_valores . "<option value='" . $reg_valores['id_valor'] . "'>" . $reg_valores['faixa_valor'] . "</option><br/>";
	}
	print $itens_valores;
	?>
	</select>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-default center-block">Postar!</button>
</div>
</form>
</body>
</html>