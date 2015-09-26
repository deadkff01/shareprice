<?php
class Postagem {
 
    private $id;
    private $idLoja;
    private $idMarca;
    private $idVestuario;
    private $preco;
    private $caminhoImagem;
    private $dataPostagem;
        
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
 
    public function getIdLoja() {
        return $this->idLoja;
    }
 
    public function setIdLoja($idLoja) {
        $this->idLoja = $idLoja;
        return $this;
    }

    public function getIdMarca() {
        return $this->idMarca;
    }
 
    public function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
        return $this;
    }

    public function getIdVestuario() {
        return $this->idVestuario;
    }
 
    public function setIdVestuario($idVestuario) {
        $this->idVestuario = $idVestuario;
        return $this;
    }

     public function getPreco() {
        return $this->preco;
    }
 
    public function setPreco($preco) {
        $this->preco = $preco;
        return $this;
    }

    public function getCaminhoImagem() {
        return $this->caminhoImagem;
    }
 
    public function setCaminhoImagem($caminhoImagem) {
        $this->caminhoImagem = $caminhoImagem;
        return $this;
    }

    public function getDataPostagem() {
        return $this->dataPostagem;
    }
 
    public function setDataPostagem($dataPostagem) {
        $this->dataPostagem = $dataPostagem;
        return $this;
    }
  
}
?>