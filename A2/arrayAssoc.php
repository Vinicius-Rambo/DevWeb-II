<?php
    $pessoa = array("nome" => "daniel", "idade" => 27);
    /*
    echo $pessoa["nome"] . "<br>";

    foreach($pessoa as $p)
        echo $p . "<br>";
    */


    $pessoa2 = array("nome" => "julia", "idade" => 18);
        $pessoas = array($pessoa, $pessoa2);

    foreach($pessoas as $p){
        echo $p["nome"] . " - " . $p["idade"];
        echo "<br>";
    }
