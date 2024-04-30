<?php
    echo '<h1>Registro Completo</h1>';
 
    $Nomelivro = $_POST['Nomelivro'];
    $Autor = $_POST['Autor'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $email = $_POST['endereco_email'];
    $nascimento = $_POST['Nascimento'];
    $Npag = $_POST['Npag'];
    $Escolha = $_POST['Escolha'];
    $descricao = $_POST['descricao']
    $categorias = $_POST['categorias'];
 
    echo '<h2>Nome do livro:</h2>' . $Nomelivro;
 
    echo '<h2>Nome do Autor:</h2>' . $Autor;
 
    echo '<h2>CPF:</h2>' . $cpf;
 
    echo '<h2>RG:</h2>' . $rg;
 
    echo '<h2>Email:</h2>' . $email;
 
    echo '<h2>Data de Nascimento</h2>' . $nascimento;
 
    echo '<h2>Numero de paginas</h2>' . $Npag;
 
    echo '<h2>Classificatoria</h2>' . $Escolha;

    echo '<h2>Sua Descrição:</h2>' . $descricao;
 
    echo '<h2>Categoria do livro</h2>' . $categorias;


?>