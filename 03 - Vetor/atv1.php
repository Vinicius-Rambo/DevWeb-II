<?php
    function fatorial($n){
        $fator = 1;
        for($i = $n; $i>=1; $i--){
            $fator *= $i;
        }
     return $fator;
    }
    for ($i =5 ; $i <= 12; $i++){
        echo "<br>";
        echo $i . " = " . fatorial($i);
    };
?>