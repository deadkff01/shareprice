<html>
	<body>
	<form method='post' enctype='multipart/form-data'><br> 
		<input type='file' name='foto' value='Cadastrar foto'>
		<input type='submit' name='submit'>
	</form> 
	<?php	

		include "classes/upload.class.php";
		include "header.php"; 

		if ((isset($_POST["submit"])) && (! empty($_FILES['foto']))){
				$upload = new Upload($_FILES['foto'], 800, 600, "img/");
					echo $upload->salvar();
		 } 
	?> 
	</body>
</html>