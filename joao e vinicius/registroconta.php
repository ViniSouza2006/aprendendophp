<?php
    echo '<h1>Registro da conta</h1>';
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
   
    echo '<p>Nome Completo</p>';
    echo $nome;
    echo $sobrenome;
    echo $idade;
    echo '<p>Anos</p>';
    echo '<p>cpf:</p>';
    echo $cpf;
    echo '<p>rg:</p>';
    echo $rg;
    echo '<p>email:</p>';
    echo $email;
    echo '<p>cidade</p>';
    echo $cidade;
    echo '<p>bairro:</p>';
    echo $bairro;
    echo '<p>rua:</p>';
    echo $rua;
?>