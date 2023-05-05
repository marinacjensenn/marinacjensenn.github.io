<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="./css/style2.css">
    <title>Administrador</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <nav class="nav-adm">
	<div class="nav_title">Bem-vindo(a), administrador!</div>
	<ul class="nav_list">
		<li class="nav__item"><a href="logout.php" style="color:black;">Sair</a></li>
	</ul>
	</nav>
    <div id="box">
        <div id="form">
            <form action="administrador.php" method="post">
                <label for="pesquisa">Nome do cartucho:</label>
                <input type="text" name="pesquisa" id="pesquisa" class="form"><br>
                <input type = "hidden" id="inputHidden" name="pesquisa-cart" value='1'>  
                <button type="submit" name="submit" class = "button">Pesquisar</button>
            </form>
            <?php
                if (!empty($_POST["pesquisa-cart"])){
            ?>
            <h3>Resultado:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nome do cartucho</th>
                        <th>Nome do usuário</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                $cartucho = $_POST['pesquisa'];
                $conexao = mysqli_connect("localhost", "root", "", "marina");
                $query = "SELECT u.nome, ca.id_user, ca.nome FROM cartuchos ca LEFT JOIN usuarios u ON u.id = ca.id_user WHERE ca.nome='$cartucho'";
                $resultado = mysqli_query($conexao, $query);
                while($linha = mysqli_fetch_array($resultado)){
                    echo "<tr><td>".$linha["nome"]."</td>
                    <td>".$linha["0"]."</td></tr>";
                }
            ?>
                </tbody>
            </table>
            <?php
                }
            ?>
            <form action="administrador.php" method="post">
                <label for="pesquisa-s">Nome do sistema:</label>
                <input type="text" name="pesquisa-s" id="pesquisa-s" class="form"><br>
                <input type="hidden" id="inputHidden" name="pesquisa-sist" value='1'>
                <button type="submit" name="submit" class = "button">Pesquisar</button>
            </form>
            <?php
                if(!empty($_POST['pesquisa-sist'])){
                    $sistema = $_POST['pesquisa-s'];
                    $conexao = mysqli_connect("localhost", "root", "", "marina");
                    $query = "SELECT nome FROM cartuchos WHERE sistema='$sistema'";
                    $resultado = mysqli_query($conexao, $query);
                    $contagem = 0;
                    while($linha = mysqli_fetch_array($resultado)){
                        $contagem++;
                    }
            ?>
                <h3>Resultado:</h3>
                <p>Existe(m) <?php echo $contagem;?> cartuchos do sistema <?php echo $sistema;?>.</p>
            <?php
                }
            ?>
            <form action="insert-sistema.php" method="post">
                <label for="insert-sistema">Nome do sistema a ser inserido:</label>
                <input type="text" name="insert-sistema" id="insert-sistema" class="form"><br>
                <button type="submit" name="submit" class = "button">Inserir</button>
            </form>
            <form action="delete-sistema.php" method="post">
                <label for="delete-sistema">Nome do sistema a ser deletado:</label>
                <input type="text" name="delete-sistema" id="delete-sistema" class="form"><br>
                <button type="submit" name="submit" class = "button">Deletar</button>
            </form>
        </div>    
    </div>
</body>
</html>