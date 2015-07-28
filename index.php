<?php require("conexao.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<TITLE>Index - TCC</TITLE>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
Nome:<br>
<input type="text" name="nome" placeholder= "Nome"><br>
<br>
<br>
<input type="submit" name="enviar" value="Postar">
</form> 
<?php require("inserir.php"); 
?>
<hr size="1">
</body>

</HTML>