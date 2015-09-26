<?php
class TipoVestuario {
 
    private $id;
    private $nome_vestuario;
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
 
    public function getNomeVestuario() {
        return $this->nome_vestuario;
    }
 
    public function setNomeVestuario($nome_vestuario) {
        $this->nome_vestuario = $nome_vestuario;
        return $this;
    }
  
}
?>