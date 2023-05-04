<?php
include("../models/conexao.php");

mysqli_query($conexao, "UPDATE img SET nome_img='".$_POST["imgNome"]."' WHERE codigo=".$_POST["imgCodigo"]);

header("location:../inicio.php");
?>