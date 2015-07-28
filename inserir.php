<?php
if(isset($_POST['enviar'])){
	$nome = mysql_real_escape_string(trim(strip_tags($_POST['nome'])));

	if(empty($nome)){
		echo '<script type="text/javascript">alert("Preencha todos os campos!");</script>';
	}else{
		$query = mysql_query("INSERT INTO postagem (nome) VALUES ('$nome')");

		if($query){
			echo '<script type="text/javascript">alert("Postagem ok!!");</script>';
		}else{
			echo '<script type="text/javascript">alert("Erro!");</script>';
		}
	}
}
?>