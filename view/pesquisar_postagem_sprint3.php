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
<title>Shareprice - Pesquisar promoção</title>
</head>
<body>
<div class="col-md-4 col-md-offset-4">
<center><h2>Pesquisar promoções!</h2></center>
<form name ="pesquisar_postagem" action="../controller/SearchController.php" method="post">
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
	<label>Preço:</label>
	<input name="preco" class="form-control"type="text" size="10" maxlength="20" onkeypress="return numero_fracionario(event)">
</div>
<div class="form-group">
	<button type="submit" class="btn btn-default center-block">Pesquisar!</button>
</div>
</form>
</body>
</html>