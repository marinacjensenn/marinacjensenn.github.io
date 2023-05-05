<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
    session_start();
    $user = $_SESSION['user'];
    if ($_SESSION['user'] == 'admin') {
        header('Location:administrador.php');
    }
?>
    <nav class="nav">
		<div class="nav_title">Bem-vindo(a), <?php echo $_SESSION['user']?>!</div>
		<ul class="nav_list">
      <li class="nav__item"><a href="insert-cart.php" style="color:black;">Registrar Cartucho</a></li>
			<li class="nav__item"><a href="logout.php" style="color:black;">Sair</a></li>
		</ul>
	</nav>
<table>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Sistema</th>
      <th class = "tela">Tela<th>
      <th class = "ano">Ano<th>
    </tr>
  </thead>
  <tbody>
      <tr>
<?php
  $conexao = mysqli_connect("localhost","root","","marina");
  if (!empty($_POST["delete_cart"])){
    $delete = $_POST["delete_cart"];
    $querydelete = "SELECT * FROM cartuchos WHERE id=$delete";
    $historicor = mysqli_query($conexao,$querydelete);
    $historico = mysqli_fetch_array($historicor);
    $nomehist = $historico['nome'];
    $sistemahist = $historico['sistema'];
    $anohist = $historico['ano'];
    $userhist = $historico['id_user'];
    $query_hist = "INSERT INTO historico(id, nome, sistema, ano, user) VALUES ('$delete', '$nomehist', '$sistemahist', '$anohist', '$userhist')";
    mysqli_query($conexao,$query_hist);
    $query_del = "DELETE FROM cartuchos WHERE id=$delete";
    mysqli_query($conexao,$query_del);

  }
  $id = $_SESSION['id']; 
  $query = "SELECT * FROM cartuchos WHERE id_user = $id";
  $resultado = mysqli_query($conexao, $query);
  while($linha = mysqli_fetch_array($resultado)){
    echo "<td>".$linha['nome']."</td>
    <td>".$linha['sistema']."</td>
    <td class = 'tela'><img src='".$linha['tela']."'></td>
    <td class = 'ano-td'>".$linha['ano']."</td>";
?>
  <td>
    <form method = "post" action="atualiza_cart.php">
    <input type = "hidden" id="inputHidden" name="atualiza_cart" value=<?php echo $linha['id']; ?>>  
      <button type = "submit" class="btn btn-info btn-xs"  >Editar</button> 
    </td>
    </form>  
    <td>
    <form method = "post" action="inicio.php">
    <input type = "hidden" id="inputHidden" name="delete_cart" value=<?php echo $linha['id']; ?> >  
      <button type = "submit" class="btn btn-danger btn-xs"  >Excluir</button> 
    </td></tr>
    </form>
  </tbody>
  <?php
  }
  ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
