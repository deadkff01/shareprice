<?php
class Loja {
 
    private $id;
    private $nome_loja;
    private $local_loja;
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
 
    public function getNomeLoja() {
        return $this->nome_loja;
    }
 
    public function setNomeLoja($nome_loja) {
        $this->nome_loja = $nome_loja;
        return $this;
    }

    public function getLocalLoja() {
        return $this->local_loja;
    }
 
    public function setLocalLoja($local_loja) {
        $this->local_loja = $local_loja;
        return $this;
    }
  
}
?>