<?php
class Categoria{
    private $idCategoria;
    private $nomeCategoria;
    
    public function getIdCategoria(){
        return $this->idCategoria;
    }
    public function setIdCategoria($value){
        $this->idCategoria = $value;
    }

    public function getNomeCategoria(){
        return $this->nomeCategoria;
    }
    public function setNomeCategoria($value){
        $this->nomeCategoria = $value;
    }
    //método para selecionar pelo id
    public function loadById($id){
        $registro = new Banco();
        $results = $registro->select("SELECT * FROM categorias_post WHERE id = :ID", array(":ID"=>$id));
        if(count($results) > 0){
            $row = $results[0];
            $this->setIdCategoria($row['id']);
            $this->setNomeCategoria($row['nome_categoria']);
        }
    }
    public function __toString()
    {
        return json_encode(array(
            "id"=>$this->getIdCategoria(),
            "nome_categoria"=>$this->getNomeCategoria()
        ));
    }
}
?>