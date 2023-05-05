<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style2.css">
    <title>Registro de Cartucho</title>
</head>

<body>
    <?php
        session_start();
    ?>
    <div id="box">
        <h2>Registre seu cartucho!</h2>
        <?php
            if (!empty($_POST['nome'])){
                $nome = $_POST['nome'];
                $sistema = $_POST['sistema'];
                $tela = $_POST['tela'];
                $ano = $_POST['ano'];
                $id_user = $_SESSION['id'];
                $conexao = mysqli_connect("localhost","root","","marina");
                $query = "INSERT INTO cartuchos (nome,sistema,tela,ano,id_user) VALUES ('$nome','$sistema','$tela','$ano','$id_user')";
                if (mysqli_query($conexao, $query)) {  
                    header("Location: inicio.php");
                };
            };
        ?>
        <div id="form">
            <form action="insert-cart.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form"><br>
                <label for="sistema">Sistema:</label>
                <select name="sistema" id="sistema" class="form">
                    <?php
                        $conexaosis = mysqli_connect("localhost", "root", "", "marina");
                        $querysis = "SELECT nome FROM sistemas";
                        $resultado = mysqli_query($conexaosis, $querysis);
                          while($linha = mysqli_fetch_array($resultado)){
                            echo "<option value='".$linha['nome']."'>".$linha['nome']."</option>";
                          }
                    ?>
                    <!-- <option value="Atari">Atari</option>
                    <option value="NES">NES</option>
                    <option value="Mega-drive">Mega-drive</option>
                    <option value="Odyssey">Odyssey</option>
                    <option value="Xbox">Xbox</option>
                    <option value="PS1">PS1</option>
                    <option value="PS2">PS2</option>
                    <option value="PS3">PS3</option>
                    <option value="MSX">MSX</option> -->
                </select><br>
                <label for="tela">Tela (link da imagem):</label>
                <input type="text" name="tela" id="tela" class="form"><br>
                <label for="ano">Ano:</label>
                <input type="text" name="ano" id="ano" class="form"><br>
                <button type="submit" name="submit" class = "button">Registrar</button>
            </form>
        </div>
    </div>
</body>

</html>