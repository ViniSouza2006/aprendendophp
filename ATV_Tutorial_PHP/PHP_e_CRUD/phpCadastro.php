<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP, de forma simples e fácil</title>
</head>
    <body>
        <?php
        if(isset($erro))
            echo '<div style="color:#F00">'.$erro.'<div><br><br>';
        else
        if(isset($sucesso))
            echo '<div style="color:#00F">'.$sucesso.'<div><br><br>';
        ?>

        <form action="<?=$_Server["PHP_SELF"]?>" method="POST">
            <label for="">Nome: </label><br>
            <input type="text" name="nome" placeholder="Digite seu Nome"><br><br>
            <label for="">E-mail: </label><br>
            <input type="email" name="email" placeholder="Digite seu Email"><br><br>
            <label for="">Cidade: </label>
            <input type="text" name="cidade" placeholder="Digite o Nome da Sua Cidade"><br><br>
            <label for="">UF:</label>
            <input type="text" name="" size="2" placeholder="UF">
            <br><br>
            <input type="hidden" value="-1" name="id">
            <button type="submit">Cadastrar</button>
        </form>
    </body>
</html>

<?php
    $obj_mysqli = new mysqli("127.0.0.1", "root", " ", "tutocrudphp");

    if ($obj_mysqli->connect_errno)
    {
        echo "Ocorrreu um erro na conexão com o banco de dados.";
        exit;
    }

    mysqli_set_charset($obj_mysqli, 'utf8');

    //Validando a existência dos dados
    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cidade"]) && isset($_POST["uf"]))
    {
        if(empty($_POST["nome"]))
            $erro = "Campo nome obrigatório";
        else
        {
            if(empty($_POST["email"]))
                $erro = "Campo e-mail obrigatório";
        else
        {
            //vamos realizar o cadastro ou alteração dos dados enviados

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $uf = $_POST["uf"];

            $stmt = $obj_mysqli->prepare("INSERT INTO 'cliente' ('nome', 'email','cidade', 'uf') VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $nome, $email, $cidade, $uf);

            if(!$stmt->execute())
            {
                $erro = $stmt->error;
            }
            else
            {
                $sucesso = "Dados cadastrados com sucesso!";
            }
        }
        }
    }
?>