<?php 
    $DateTime = date("Y-m-d");
    $datadenascimento = $_POST['DataNasc'];

    echo '<p>data atual:</p>'.$DateTime.'<br>';
    echo  '<p>Sua data de nascimento:</p>'.$DataNasc;

    $diferenca = $DateTime = date_diff($Datetime,$DataNasc);

    echo '<h2>Anos</h2>' .$diferenca -> y. '<br>';
?>