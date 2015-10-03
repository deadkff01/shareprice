<?php

//Controller responsável pelo upload da imagem

class Upload{
	private $arquivo; 
	private $pasta; 

	function __construct($arquivo, $pasta){
		$this->arquivo = $arquivo; 
		$this->pasta = $pasta; 
	} 

	private function getExtensao(){
		//retorna a extensao da imagem
		return $extensao = strtolower(end(explode('.', $this->arquivo['name']))); 
	} 

	private function ehImagem($extensao){
		// extensoes permitidas
		$extensoes = array('jpeg', 'jpg', 'png'); 
		if (in_array($extensao, $extensoes))
			return true;	
	}

	public function salvar(){
		$extensao = $this->getExtensao();
		 //gera um nome unico para a imagem em funcao do tempo 
		 $novo_nome = time() . '.' . $extensao; 
		 //localizacao do arquivo 
		 $destino = $this->pasta . $novo_nome; 

		 //move o arquivo
		 if (! move_uploaded_file($this->arquivo['tmp_name'], $destino)){

		 	if ($this->arquivo['error'] == 0){
		 		return "Arquivo enviado com sucesso!";
		 	}

		 	if ($this->arquivo['error'] == 1){
		 		return "Tamanho excede o permitido";
		 	}

		 	else 
		 		return "Erro " . $this->arquivo['error'];
		}
	}
}
?>