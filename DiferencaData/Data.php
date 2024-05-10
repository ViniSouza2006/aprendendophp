<?php 
    $DateTime = date("Y-m-d");
    $datadenascimento = $_POST['obterdia'];

    echo '<p>data atual:</p>'.$DateTime.'<br>';
    echo  '<p>Sua data de nascimento:</p>'.$datadenascimento;

    $diferenca = $DateTime = date_diff($datetime,$datadenascimento);

    echo '<h2>Anos</h2>' .$diferenca -> y. '<br>';
?>