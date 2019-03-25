<?php
require_once("config.php");
$bd = new Banco();
$registro = $bd->select("SELECT * FROM categorias_post");
echo json_encode($registro);
?>