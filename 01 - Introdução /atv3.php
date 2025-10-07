<?php
    echo "Imprimindo os números de 0 a 50 divisiveis por 3" . "<br>";

    for($n = 1; $n <= 50; $n++){
        if($n % 3 == 0){
            echo $n . "<br>";
        }
    }


?>