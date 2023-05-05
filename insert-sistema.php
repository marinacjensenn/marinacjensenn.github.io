<?php
    $sistema = $_POST['insert-sistema'];

    $conexao = mysqli_connect("localhost", "root", "", "marina");

    $query = "INSERT INTO sistemas (nome) VALUES ('$sistema')";
    mysqli_query($conexao, $query);

    if (mysqli_query($conexao, $query)) {  
        header("Location: administrador.php");
    } else {
        header("Location: administrador.php?msg=ERRO");
    }
?>