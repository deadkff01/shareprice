<?php
class Marca {
 
    private $id;
    private $nome_marca;
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
 
    public function getNome_Marca() {
        return $this->nome_marca;
    }
 
    public function setNome_Marca($nome_marca) {
        $this->nome_marca = $nome_marca;
        return $this;
    }
  
}
?>