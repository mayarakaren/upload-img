<?php

include("../models/conexao.php");

mysqli_query($conexao,"DELETE FROM img WHERE codigo = ".$_GET["ida"]);

$file = $_GET["deletarArquivo"];
$dir = "arquivos/";
unlink($dir . $file);
header("location:inicio.php");

?>