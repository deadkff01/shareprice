<?php

class Upload{
	private $arquivo;
	private $altura;
	private $largura;
	private $pasta;

function __construct($arquivo, $altura, $largura, $pasta){
		$this->arquivo = $arquivo; 
		$this->altura = $altura; 
		$this->largura = $largura; 
		$this->pasta = $pasta;
}

//funcao que retorna a extensao da imagem
private function getExtensao(){
	
	return $extensao = strtolower(end(explode('.', $this->arquivo['name'])));
}

//funcao que verifica se a extensao eh permitida
private function ehImagem($extensao){
	$extensoes = array('jpeg', 'png'); //extensoes permitidas
	if (in_array($extensao, $extensoes))
		return true;
}

//funcao que redimensiona a imagem para o site
//parametros usados (largura,altura,tipo e localizao da imagem original)
private function redimensionar($imgLargura, $imgAltura, $tipo, $img_localizacao){
	//descobrir o novo tamanho sem perder a proporcao
	if ($imgLargura > $imgAltura){
		$novaLargura = $this->largura;
		$novaAltura = round( ($novaLargura / $imgLargura) * $imgAltura);
	}
	else if ( $imgAltura > $imgLargura){
		$novaAltura = $this->altura;
		$novaLargura = round( ($novaAltura / $imgAltura) * $imgLargura);
	}
	else //altura == largura
		$novaAltura = $novaLargura = max($this->largura, $this->altura);

//cria uma nova imagem com o novo tamanho
$novaImagem = imagecreatetruecolor($novaLargura, $novaAltura);

switch ($tipo){
	case 1: //jpg
	$origem = imagecreatefromjpeg($img_localizacao);
	imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $novaLarg, $novaAlt, $imgLarg, $imgAlt);
	imagejpeg($novaimagem, $img_localizacao);
	break;
	case 2: //png
	$origem = imagecreatefrompng($img_localizacao);
	imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $novaLarg, $novaAlt, $imgLarg, $imgAlt);
	imagepng($novaimagem, $img_localizacao);
	break;
}

//destroi as imagens criadas
imagedestroy($novaimagem);
imagedestroy($origem);
}


	public function salvar(){

		$extensao = $this->getExtensao();

		//gera um nome unico para a imagem em funcao do tempo 
		$novo_nome = time() . '.' . $extensao; 
		//localizacao do arquivo 
		$destino = $this->pasta . $novo_nome;

		//move o arquivo 
		if (! move_uploaded_file($this->arquivo['tmp_name'], $destino)){
			if ($this->arquivo['error'] == 1) 
				return "Tamanho excede o permitido"; 
			else 
				return "Erro " . $this->arquivo['error']; 
		}

		if ($this->ehImagem($extensao)){
			//pega a largura, altura, tipo e atributo da imagem 
			list($largura, $altura, $tipo, $atributo) = getimagesize($destino); 

			// testa se é preciso redimensionar a imagem 
			if(($largura > $this->largura) || ($altura > $this->altura)) $this->redimensionar($largura, $altura, $tipo, $destino); 
		} 
		return "Sucesso";

	}
}
?>