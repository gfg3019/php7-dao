<?php
require_once("config.php");
//Carrega um usuário
//$root = new Usuario();
//$root->loadbyId(3);
//echo $root;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("jo");
//echo json_encode($search);

//carrega um usuário usando o login e a senha
//$usuario = new Usuario();
//$usuario->login("root", "!@#$");

/* Criando um novo usuario
$aluno = new Usuario("kenzo", "jid343");
$aluno->insert();
echo $aluno;*/

/* alterando um registro
$usuario = new Usuario();
$usuario->loadById(3);
$usuario->update("kenzinho","sdfghjhgfd");
echo $usuario;*/

$usuario = new Usuario();
$usuario->loadById(1);
$usuario->delete();
echo $usuario;
?>
