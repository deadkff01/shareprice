<?php
include_once('../model/Postagem.php');
 
class PostagemDAO {
 
    private $conn;

    public function __construct() {
        $registry = Registry::getInstance();
        $this->conn = $registry->get('Connection');
    }
 
    public function inserePostagem(Postagem $postagem) {
        $this->conn->beginTransaction();
 
        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO postagem (caminho_imagem) VALUES (:caminho_imagem)'
            );
 
            $stmt->bindValue(':caminho_imagem', $post->getCaminhoPostagem);
            $stmt->execute();
 
            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
        }
    }
 
    public function listarTodasPostagens() {
        $statement = $this->conn->query(
            'SELECT * FROM postagens'
        );
 
        return $this->processarResultados($statement);
    }
 
    private function processarResultados($statement) {
        $results = array();
 
        if($statement) {
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $postagem = new Postagem();
 
                $post->setCaminhoImagem($row->caminho_postagem);
                 
                $results[] = $post;
            }
        }
 
        return $results;
    }
 
}
?>