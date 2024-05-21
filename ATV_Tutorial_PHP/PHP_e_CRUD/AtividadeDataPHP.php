<?php
if(isset($_POST["Nome"])&& isset($_POST["Marca"])&& isset($_POST["UniMedida"])&& isset($_POST["Origem"]))
{
    if(empty($_POST["Nome"]))
        $erro = "Campo nome Obrigatório!";
    else
    if(empty($_POST["Marca"]))
        $erro = "Campo Marca Obrigatório!";
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
        <input type="text" name="Nome">
        <br><br>
        <label for="">Marca do Produto: </label>
        <input type="text" name="Marca">
        <br><br>
        <label for="">Unidade de Medida: </label>
        <input type="text" name="UniMedida">
        <br><br>
        <label for="">Origem do Produto: </label>
        <input type="text" name="Origem">
        <br><br>
        <input type="hidden" value="-1" name="id">
        <button type="submit">Cadastrar</button>
    </form>
    </fieldset>
    <br>
</body>
</html>