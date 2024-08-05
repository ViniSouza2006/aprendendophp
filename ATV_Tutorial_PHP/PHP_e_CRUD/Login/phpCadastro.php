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
        <fieldset>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
            <label for="">Nome: </label><br>
            <input type="text" name="nome" placeholder="Digite seu Nome"><br><br>
            <label for="">E-mail: </label><br>
            <input type="email" name="email" placeholder="Digite seu Email"><br><br>
            <label for="">Cidade: </label><br>
            <input type="text" name="cidade" placeholder="Digite o Nome da Sua Cidade"><br><br>
            <label for="">UF:</label><br>
            <input type="text" name="" size="2" placeholder="UF">
            <br><br>
            <input type="hidden" value="-1" name="id">
            <button type="submit">Cadastrar</button>
        </form>
        </fieldset>
        <br>
        <br>
        <table>
            <tr>
               <td><strong>#</strong></td>
               <td><strong>Nome</strong></td>
               <td><strong>Email</strong></td>
               <td><strong>Cidade</strong></td>
               <td><strong>UF</strong></td>
               <td><strong>#</strong></td> 
            </tr>
            <?php
            $result = $obj_mysqli->query("SELECT * FROM `cliente`");
            while ($aux_query = $result->fetch_assoc())
            {
                echo '<tr>';
                echo  ' <td>'.$aux_query["Id"]; 
                echo  ' <td>'.$aux_query["Nome"];  
                echo  ' <td>'.$aux_query["Email"];  
                echo  ' <td>'.$aux_query["Cidade"];  
                echo  ' <td>'.$aux_query["UF"];  
                echo  ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["Id"].'">Editar</a></td>';  
                echo  '</tr>';  
            }
            ?>
        </table>
    </body>
</html>

<?php
    $obj_mysqli = new mysqli("127.0.0.1", "root", " ", "tutocrudphp");

    if ($obj_mysqli->connect_errno)
    {
        echo "Ocorrreu um erro na conexão com o banco de dados.";
        exit;
    }

    mysqli_set_charset($obj_mysqli, 'UTF-8');

    //Validando a existência dos dados
    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cidade"]) && isset($_POST["uf"]))
    {
        if(empty($_POST["nome"]))
            $erro = "Campo nome obrigatório";
        else
        if(empty($_POST["email"]))
                $erro = "Campo e-mail obrigatório";
        else
        {
            //vamos realizar o cadastro ou alteração dos dados enviados
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $uf = $_POST["uf"];

            if($id == -1)
            {

            $stmt = $obj_mysqli->prepare("INSERT INTO `cliente` (`nome`, `email`,`cidade`, `uf`) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $nome, $email, $cidade, $uf);

            if(!$stmt->execute())
            {
                $erro = $stmt -> error;
            }
            else
            {
               header(Location:cadastro.php);
               exit;
            }
        }
        else
        if(is_numeric($id) && $id >= 1)
        {
            $stmt = $obj_mysqli->prepare("UPDATE `cliente` SET `nome`=?, `email`=?, `cidade`=?, `uf`=? WHERE id = ?");
            $stmt->bind_param('ssssi', $nome, $email, $cidade, $uf, $id);

            if(!$stmt->execute())
            {
                $erro = $stmt->error;
            }
            else
            {
                header("Location:cadastro.php");
                exit;
            }
            }
            else
            {
                
        }
    }
    }
?>