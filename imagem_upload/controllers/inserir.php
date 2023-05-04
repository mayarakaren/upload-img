<?php
include("../models/conexao.php");

$varimgNome = $_POST["imgNome"];


mysqli_query($conexao, "INSERT INTO img (nome) 
VALUES ('". $_POST["imgNome"]."')");

header("location:../inicio.php");
?>