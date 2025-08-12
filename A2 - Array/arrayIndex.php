<?php

$numeros = array(5, 16, 7, 9, 12); //Declaração do Array;

echo $numeros[2] . "<br><br>" ;
$numeros[2]; 
/*
echo "<br>Impressão dos elementos do array<br>";
for($i = 0; $i < count($numeros);$i++){
    echo $numeros[$i] . "<br>";
}
*/
array_push($numeros, 8);
foreach($numeros as $num){
    echo $num . "<br>";
}









?>