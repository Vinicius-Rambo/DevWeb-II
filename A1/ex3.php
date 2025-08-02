<?php
    echo "Todos os anos Bissexto de 1980 até 2024" . "<br>";

    for($i = 1980; $i<= 2024; $i++){
        if(($i % 4) == 0){
            if(($i % 100) == 0){
                if(($i % 400) == 0){
                    echo $i . "<br>";
                }
                
                }else{
               echo $i. "<br>";
            } 
        }
    }

?>