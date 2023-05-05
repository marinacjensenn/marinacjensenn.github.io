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
    <?php
    if(!empty($_POST["at_cartucho"])){
    $nome = $_POST['nome'];
    $sistema = $_POST['sistema'];
    $tela = $_POST['tela'];
    $ano = $_POST['ano'];
    $id_cart = $_POST['at_cartucho'];
  
    $conexao = mysqli_connect("localhost","root","","marina");
    
    $query = "UPDATE cartuchos SET nome='$nome', sistema='$sistema', tela='$tela', ano='$ano'  WHERE id='$id_cart'";
        if (mysqli_query($conexao, $query)) {
            header('Location:inicio.php');
        }
    }
    ?>
    <div id="box">
        <h2>Atualize seu cartucho!</h2>
    <?php
        if (!empty($_POST["atualiza_cart"])){
            $id_cart = $_POST['atualiza_cart'];
            $conexao = mysqli_connect("localhost","root","","marina");
            $query = "SELECT * FROM cartuchos WHERE id=$id_cart";
            $resultado = mysqli_query($conexao,$query);  
            $linha = mysqli_fetch_array($resultado);
?>
        <div id="form">
            <form action="atualiza_cart.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form" value="<?php echo $linha['nome'];?>"><br>
                <label for="sistema">Sistema:</label>
                <select name="sistema" id="sistema" class="form">
                    <option value="Atari">Atari</option>
                    <option value="NES">NES</option>
                    <option value="Mega-drive">Mega-drive</option>
                    <option value="Odyssey">Odyssey</option>
                    <option value="Xbox">Xbox</option>
                    <option value="PS1">PS1</option>
                    <option value="PS2">PS2</option>
                    <option value="PS3">PS3</option>
                    <option value="MSX">MSX</option>
                </select><br>
                <label for="tela">Tela (link da imagem):</label>
                <input type="text" name="tela" id="tela" class="form" value="<?php echo $linha['tela'];?>"><br>
                <label for="ano">Ano:</label>
                <input type="text" name="ano" id="ano" class="form" value="<?php echo $linha['ano'];?>"><br>
                <input type = "hidden" id="inputHidden" name="at_cartucho" value="<?php echo $linha['id']; ?> ">
                <button type="submit" name="submit" class = "button">Registrar</button>
            </form>
        </div>
    </div>
    <?php
        }
        else {
            echo "ih quberou";
        }
    ?>
</body>
</html>