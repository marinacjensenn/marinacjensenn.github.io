<?php
    $sistema = $_POST['delete-sistema'];

    $conexao = mysqli_connect("localhost", "root", "", "marina");

    $query = "DELETE FROM sistemas WHERE nome='$sistema'";
    mysqli_query($conexao, $query);

    if (mysqli_query($conexao, $query)) {  
        header("Location: administrador.php");
    } else {
        header("Location: administrador.php?msg=ERRO");
    }
?>