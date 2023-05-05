<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div id="box">
        <h2>Bem-vindo(a)!</h2>
        <?php
            if(!empty($_GET['msg'])){
                if ($_GET['msg'] == "OK"){
        ?>
            <h3>Registro concluído! Faça login para continuar.</h3>
        <?php

                }
                else if ($_GET['msg'] == "ERRO") {
        ?>
            <h3>Registro negado! Por favor, <a href="registro.html">tente novamente</a>.</h3>
        <?php
                }
                else if ($_GET['msg'] == "ERRO_LOGIN") {
        ?>
            <h3>Usuário ou senha incorretos. Tente novamente.</h3>
        <?php
                }
            }
            else {
        ?>
        <h3>Faça login ou <a href="registro.html">registre-se</a>.</h3>
        <?php
            }
        ?>
        <div id="form">
            <form action="cliente.php" method="POST">
                <label for="user">Usuário:</label>
                <input type="text" name="user" id="user" class="form"><br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form"><br>
                <button type="submit" name="submit" class = "button">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>