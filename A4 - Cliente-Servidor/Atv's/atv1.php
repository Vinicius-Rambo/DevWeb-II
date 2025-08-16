<?php
function soma($n1, $n2){
    return $n1 + $n2;
}

/*
echo "Soma de dois valores com GET <br>";
$num1 = $_GET["num1"];
$num2 = $_GET["num2"];

echo "A soma de " . $num1 . " + " . $num2 . " = " . soma($num1, $num2) . "<br>";  
*/

echo "Soma de dois valores com POST <br>";

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];

echo "A soma de " . $num1 . " + " . $num2 . " = " . soma($num1, $num2) . "<br>"; 
?>