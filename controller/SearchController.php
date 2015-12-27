<?php
include "../view/header.php";
include "../controller/DatabaseConnection.php";
?>
<!DOCTYPE html>
<html>
<thead>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Shareprice - Pesquisar promoção</title>
</thead>
<table class="table table-striped">
<tbody>
<?php

$id_marca = isset($_POST['id_marca']) ? $_POST['id_marca'] : '';
$id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
$id_loja =  isset($_POST['id_loja']) ? $_POST['id_loja'] : '';
$preco = isset($_POST['preco']) ? $_POST['preco'] : '';
$where = isset($_POST['where']) ? $_POST['where'] : '';

if( $id_marca ){ $and[] = " `m.nome_marca` = '{$id_marca}'"; }
		if( $id_categoria ){ $and[] = " `c.nome_categoria` = '{$id_categoria}'"; }
		if( $id_loja ){ $and[] = " `l.nome_loja` = '{$id_loja}'"; }
		if( $preco ){ $and[] = " `preco` = '{$preco}'"; }

$sql = "SELECT m.nome_marca, c.nome_categoria, l.nome_loja, p.preco, p.conteudo, p.caminho_imagem, p.data_postagem FROM postagens p
		INNER JOIN categorias c ON p.id_categoria = c.id_categoria
		INNER JOIN lojas l ON p.id_loja = l.id_loja
		INNER JOIN marcas m ON p.id_marca =  m.id_marca
		WHERE p.ativa = '1'";
		if( sizeof( @$and ) )
			@$sql .= ' AND '.implode ($where);
		$rs = mysql_query($sql, $conexao);
		@$total_registros = mysql_num_rows($rs);

		if ($total_registros > 0){
		while ($reg = mysql_fetch_array($rs)){
		$id_marca = $reg["id_marca"];
		$id_categoria = $reg["id_categoria"];
		$id_loja = $reg["id_loja"];
		$preco = $reg["preco"];
		$conteudo = $reg["conteudo"];
		$caminho_imagem = $reg["caminho_imagem"];
		$data_postagem = $reg["data_postagem"];
?>
<tr>
<th>Imagem mercadoria</th>
<th>Marca</th>
<th>Categoria</th>
<th>Loja</th>
<th>Preço</th>
<th>Conteúdo</th>
<th>Data da postagem</th>	
</tr>
<tr>
<td><img src = "<?php print $caminho_imagem; ?>" width="300" height = "300"></td>
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
	mysql_free_result($rs);
	//Encerra o if de exibição
}else {
	print "Nenhuma promoção encontrada, favor refazer a pesquisa!";
}
?>
</table>
</tbody>
</html>
<?php
	mysql_close($conexao);
?>