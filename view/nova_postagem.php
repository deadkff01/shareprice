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
		if (document.nova_postagem.id_categoria.value == "0"){
			alert("Por favor, selecione uma categoria.");
			nova_postagem.id_categoria.focus();
			return false;
		}
		if (document.nova_postagem.id_loja.value == "0"){
			alert("Por favor, selecione uma loja.");
			nova_postagem.id_loja.focus();
			return false;
		}
		if (document.nova_postagem.preco.value == ""){
			alert("Por favor, digite o preço da promoção.");
			nova_postagem.preco.focus();
			return false;
		}
		return true;
	}

	//Aceita somente valores numéricos com separador decimal( virgula ou ponto).
	function numero_fracionario(e){
		var tecla = (window.event)?event.keyCode:e.which;
		if((tecla > 47 && tecla < 58) || tecla == 46 || tecla == 44)
		return true;
		
		else{
			if (tecla != 8)
			return false;
			else return true;
		}
	}
</script>
</head>
<body>
<div class="col-md-4 col-md-offset-4">
<center>
<h2>Nova promoção</h2> 
<small><font color="red">É necessário preencher todos os campos!</font></small>
</center>
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
	<label>Categoria:</label>
	<select name="id_categoria" class="form-control">
	<?php	
	// Carrega combo  de categorias
	$itens_categorias = "<option value='0' >-- Selecione uma categoria</option><br/>";
	$sql_categorias = "SELECT * FROM categorias order by nome_categoria";
	$rs_categorias = mysql_query($sql_categorias,$conexao);
	while ($reg_categorias = mysql_fetch_array($rs_categorias)){
	$itens_categorias = $itens_categorias . "<option value='" . $reg_categorias['id_categoria'] . "'>" . $reg_categorias['nome_categoria'] . "</option><br/>";
	}
	print $itens_categorias;
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
	<label>Preço:</label>
	<input name="preco" class="form-control"type="text" size="10" maxlength="20" onkeypress="return numero_fracionario(event)">
</div>
<div class="form-group">
	<button type="submit" class="btn btn-default center-block">Postar!</button>
</div>
</form>
</body>
</html>