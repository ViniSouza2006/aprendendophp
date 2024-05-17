<?php
    $texto01 = "Primeiro texto do iscript";
    print ($texto01);
    echo '<br>';

    //print ("texto02");
    print('<span style="color:red">'.$texto01.'</span>');
    //print ($texto02);
    echo '<br>';

    //tratando datas
    $raw = '22.11.1968';
    $start = DateTime::createfromformat('d.m.Y',$raw);
    echo "Data de Inicio: " .$start->format('Y-m-d'). "\n";

    $end= clone $start;
    $end->add(new DateInterval('P1M6D'));

    $diff=$end->diff($start);
    echo "Diferença: " .$diff-> format('%m mes, %d dias (toatal: %a dias)'). "\n";
    //Diferença: 1 mês, 6 dias (total: 37 dias)
    if($start < $end) {
        echo "Começa antes do fim!\n";
    }

        // mostra todas as quintas-feiras entre $start e $end 
        $periodInterval = DateInterval::createFromDateString('first thursday'); 
        $periodIterator = new DatePeriod($start, $periodInterval, $end, DatePeriod::EXCLUDE_START_DATE);
        
        echo "<br>";

        foreach($periodIterator as $date) {     
            //mostra cada data no período     
            echo $date->format('d-m-Y') . " "; 
    }
?>