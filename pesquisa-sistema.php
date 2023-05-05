<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Sistema</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style2.css">
</head>
<body>
    <nav class="nav-adm">
	<div class="nav_title">Bem-vindo(a), administrador!</div>
	<ul class="nav_list">
        <li class="nav__item"><a href="administrador.php" style="color:black;">Home</a></li>
		<li class="nav__item"><a href="logout.php" style="color:black;">Sair</a></li>
	</ul>
	</nav>
    <?php
        $sistema = $_POST['pesquisa-s'];
        $conexao = mysqli_connect("localhost", "root", "", "marina");
        $query = "SELECT nome FROM cartuchos WHERE sistema='$sistema'";
        $resultado = mysqli_query($conexao, $query);
        $contagem = 0;
        while($linha = mysqli_fetch_array($resultado)){
            $contagem++;
        }
    ?>
    <div id="box">
        <h3>Resultado:</h3>
        <p>Existe(m) <?php echo $contagem;?> cartuchos do sistema <?php echo $sistema;?>.</p>
    </div>
</body>
</html>