<?php
require_once("config.php");
$rt = new Categoria();
$rt->loadById(2);
echo $rt;
?>