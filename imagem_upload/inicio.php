<?php 
include("models/conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style> 

    .formulario{
        display:flex;
        justify-content: space-between;
        flex-direction: column;
    }
        </style>

</head>


<body class="bg-secondary">
<div class="container bg-white mt-5 rounded-2 p-3 shadow-lg">
    <form class="formulario" name="upload" enctype="multipart/form-data" method="post" action="upload.php">
    <div>
        <input type="hidden" nam="MAX_FILE_SIZE" value="100000">
        <input type="file" name="arquivo[]" multiple="multiple">
    </div>
    <div class="botao-input">
        <br>
        <input name="enviar" type="submit" value="Enviar" class="btn btn-success">
    <div>
    </form>
    <br>
    <br>
    <form action="inicio.php" method="post">
        <input class="form-control" type="text" name="buscar" size="30" placeholder="Buscar">
    </form>
    <hr>
    <hr>
    <?php
        if(empty($_POST["buscar"])){
            echo "Nenhum resultado";
        } else { 
        $varBusca = $_POST["buscar"];

        $path = "arquivos/";
        $diretorio = dir($path)
    ?>

    <table border="1">
        <tr>
            <td>Nome</td>
            <td>Arquivos</td>
            <td>Ação</td>
        </tr>

        <?php
        $query = mysqli_query($conexao, "SELECT * FROM img WHERE nome LIKE '%$varBusca%'");
        while($exibe = mysqli_fetch_array($query) && $arquivo = $diretorio -> read()){

        echo"<tr>".
            "<td><a href='<?php echo $path.$arquivo ?>'>.<?php echo $arquivo ?></a></td>".
            "<td><a href='../controllers/delete.php?deletarArquivo=<?php echo $arquivo?>'>Excluir</a></td>" .
            "</tr>";

        }
        $diretorio -> close();
    }
        ?>
    </table>
</div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>