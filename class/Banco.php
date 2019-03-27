<?php
class Banco extends PDO{
    private $conn;
    //conectando com o banco de dados
    public function __construct(){
    
        $this->conn = new PDO("mysql:host=127.0.0.1;dbname=php7", "root", "");
                    
    }
    //passando parametros 
    private function setParams($statemente, $parameters = array()){
        foreach ($parameters as $key => $value) {
            $this->setParam($statemente,$key, $value);
        }
    }
    private function setParam($statemente, $key, $value){
        $statemente->bindParam($key, $value);
    }
    public function query($rawQuery, $params = array()){
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }
    //Selecionar tabelas ou db
    public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
}
?>