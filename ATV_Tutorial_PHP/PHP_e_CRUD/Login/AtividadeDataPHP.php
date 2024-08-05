<?php
$obj_mysqli = new mysqli("127.0.0.1", "root", "", "tutocrudphp");

if ($obj_mysqli->connect_errno)
{
    echo "Ocorreu um erro na conexão com o banco de dados.";
    exit;
}

mysqli_set_charset($obj_mysqli, 'utf8');

if(isset($_POST["Nome"])&& isset($_POST["Marca"])&& isset($_POST["UniMedida"])&& isset($_POST["Origem"]))
{
    if(empty($_POST["Nome"]))
        $erro = "Campo nome Obrigatório!";
    else
    if(empty($_POST["Marca"]))
        $erro = "Campo Marca Obrigatório!";
    else
    if(empty($_POST["UniMedida"]))
        $erro = "Campo de Unidade de Medida Obrigatório!";
    else
    if(empty($_POST["Origem"]))
        $erro = "Campo Origem Obrigatório!"; 
}
{
    $Nome = $_POST["Nome"];
    $Marca = $_POST["Marca"];
    $UniMedida = $_POST["UniMedida"];
    $Origem = $_POST["Origem"];

    $stmt = $obj_mysqli->Prepare("INSERT INTO `produto`(`Nome, Marca, UniMedida, Origem`) VALUES (?,?,?,?)");
    $stmt ->bind_param('ssss', $Nome, $Marca, $UniMedida, $Origem);

    if(!$stmt->execute())
    {
        $erro = $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
</head>
<body>
    <fieldset>
        <legend>Cadastro Produto</legend>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
        <label for="">Nome do Produto: </label>
        <input type="text" name="Nome" placeholder = "Digite o Nome do Produto">
        <br><br>
        <label for="">Marca do Produto: </label>
        <input type="text" name="Marca" placeholder = "Digite a Marca do Produto">
        <br><br>
        <label for="">Unidade de Medida: </label>
        <input type="text" name="UniMedida" placeholder = "Digite a Unidade de Medida do Produto">
        <br><br>
        <label for="">Origem do Produto: </label>
        <input type="text" name="Origem" placeholder = "Digite a Origem do Produto">
        <br><br>
        <input type="hidden" value="-1" name="id">
        <button type="submit">Cadastrar</button>
    </form>
    </fieldset>
    <br>
</body>
</html>