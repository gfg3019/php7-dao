<?php
class Categoria{
    
    
    private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}
    //método para selecionar pelo id
    public function loadById($id){
        
		$sql = new Banco();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}
    }
    //metodo para listar todo os registros
    public static function getList(){
        $sql = new Banco();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }
    //método para buscar o usuario peleo login
    public static function search($login){
        $sql = new Banco();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"
		));

    }
    //método para selecio um registro altenticado
    public function login($login, $password){
       
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		} else {

			throw new Exception("Login e/ou senha inválidos.");

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