<?php
session_start();

$user = $_POST['user'];
$senha  = md5($_POST['senha']);

$conexao = mysqli_connect("localhost","root","","marina");

$query = "SELECT * FROM usuarios WHERE nome='$user' and senha= '$senha'";

if ($result=mysqli_query($conexao, $query)) {

  $linha = mysqli_fetch_array($result);
  if(!empty($linha)){
    $_SESSION['user'] = $linha['nome'];
    $_SESSION['email'] = $linha['email'];
    $_SESSION['id'] = $linha['id'];
    header("Location: inicio.php");
  }else{
    unset($_SESSION['user']);
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    header("Location: index.php?msg=ERRO_LOGIN");
  }
    //header("Location: login.php?msg=OK");
} else {
    header("Location: index.php?msg=ERRO");
}
?>