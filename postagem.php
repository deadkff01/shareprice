<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shareprice - Nova postagem</title>
    <link href="css/signin.css" rel="stylesheet">
</head>
	<body>

<div class="container">

      <form class="form-signin">
			<form method='post' enctype='multipart/form-data'><br>
			Selecione uma imagem: 
			<input type='file' name='foto' value='Cadastrar foto'>

                    <label for="tipo">Tipo de produto:</label>
                    <select name="tipoSelecionado" id="tipo" class="form-control">
                        <option value="-1">Selecione...</option>
                        <s:iterator value="tipos">
                            <option value="<s:property value="id" />"><s:property value="tipo"/></option>
                        </s:iterator>
                    </select>



                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control" rows="3" name="descricao" id="descricao"></textarea>

                

                    <label for="preco">Preço:</label>
                    <input class="form-control" type="text" name="preco" id="preco" onkeyup='if (isNaN(this.value)) {this.value = ""}'/>



                    <label for="loja">Loja:</label>
                    <select name="lojaSelecionada" id="loja" class="form-control">
                        <option value="-1">Selecione...</option>
                        <s:iterator value="lojas">
                            <option value="<s:property value="id" />"><s:property value="nome"/></option>
                        </s:iterator>
                    </select>



                    <label for="marca">Marca</label>
                    <select name="marcaSelecionada" id="marca" class="form-control">
                        <option value="-1">Selecione...</option>
                        <s:iterator value="marcas">
                            <option value="<s:property value="id" />"><s:property value="nome"/></option>
                        </s:iterator>
                    </select>
                <input type='submit' name='submit'>

		</div> <!-- /container -->
    </form>
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