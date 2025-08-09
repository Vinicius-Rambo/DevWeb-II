<?php
echo "Média Aritmetica<br>";
$num = array(75, 22, 32, 96, 31, 1, 2, 3, 4,5);
$soma = 0;

echo "Seus numeros são: ";
foreach ($num as $n1){
    echo $n1 . " ";
    $soma += $n1;
}
$media = $soma /10;
echo "<br>sua media é: " . $media;
?>