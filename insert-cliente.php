<?php
    $user = $_POST['user'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $conexao = mysqli_connect("localhost", "root", "", "marina");

    $query = "INSERT INTO usuarios (nome,email,senha) VALUES ('$user','$email','$senha')";
    mysqli_query($conexao, $query);

    if (mysqli_query($conexao, $query)) {  
        header("Location: index.php?msg=OK");
    } else {
        header("Location: index.php?msg=ERRO");
    }
?>