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
	<?php
	//Armazena os dados do select na variavel sql
	$sql = "SELECT id_postagem, id_marca, id_categoria, id_loja, preco, conteudo, caminho_imagem, data_postagem FROM postagens WHERE ativa = '1' ";
	$rs = mysql_query($sql, $conexao);
	?>
<body>
<center><h2>Pesquisar promoções!</h2></center>
<table class="table table-striped">
<thead>
<tbody>
<tr>
<th>Imagem mercadoria</th>
<th>ID</th>
<th>Marca</th>
<th>Categoria</th>
<th>Loja</th>
<th>Preço</th>
<th>Conteúdo</th>
<th>Data da postagem</th>	
</tr>
</thead>
<?php
	//Inicia o laço de exibicão
	while ($reg = mysql_fetch_array($rs)){
		$id_postagem = $reg["id_postagem"];
		$id_marca = $reg["id_marca"];
		$id_categoria = $reg["id_categoria"];
		$id_loja = $reg["id_loja"];
		$preco = $reg["preco"];
		$conteudo = $reg["conteudo"];
		$caminho_imagem = $reg["caminho_imagem"];
		$data_postagem= $reg["data_postagem"];
	
	?>
<tr>
<td><img src = "<?php print $caminho_imagem; ?>" width="700" height = "300"></td>
<td><?php print $id_postagem; ?></td>
<td><?php print $id_marca; ?></td>
<td><?php print $id_categoria; ?></td>
<td><?php print $id_loja; ?></td>
<td><?php print $preco; ?></td>
<td><?php print $conteudo; ?></td>
<td><?php print substr($data_postagem,8,2) . '/' . substr($data_postagem,5,2) . '/' . substr($data_postagem,0,4); ?></td>
</tr>
</tbody>
	<?php
	//Encerra o while de exibição
	}
	?>
</table>
</body>
</html>
<!-- encerra a conexao com o banco de dados-->
	<?php
	mysql_free_result($rs);
	mysql_close($conexao);
	?>