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
<tr>
<th>Imagem mercadoria</th>
<th>Marca</th>
<th>Categoria</th>
<th>Loja</th>
<th>Preço</th>
<th>Conteúdo</th>
<th>Data da postagem</th>	
</tr>
<?php

$id_marca = isset($_POST['id_marca']) ? $_POST['id_marca'] : '';
$id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
$id_loja =  isset($_POST['id_loja']) ? $_POST['id_loja'] : '';
$preco = isset($_POST['preco']) ? $_POST['preco'] : '';

if( $id_marca ){ $and[] = " `id_marca` = '{$id_marca}'"; }
		if( $id_categoria ){ $and[] = " `id_categoria` = '{$id_categoria}'"; }
		if( $id_loja ){ $and[] = " `id_loja` = '{$id_loja}'"; }
		if( $preco ){ $and[] = " `preco` = '{$preco}'"; }

$sql = "SELECT id_marca, id_categoria, id_loja, preco, conteudo, caminho_imagem, data_postagem FROM postagens WHERE ativa = '1' ";
		if( sizeof( @$and ) )
			$sql .= ' AND '.implode( $where );
		$rs = mysql_query($sql, $conexao);

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
	?>
</table>
</tbody>
</html>
<?php
	mysql_free_result($rs);
	mysql_close($conexao);
?>