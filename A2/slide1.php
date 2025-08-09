<?php


$times = array("Grêmio", "Inter", "São Paulo", "Palmeiras", "Flamengo");
$marcasTech = array("Samsung", "Apple", "Xiomi", "Dell", "intel");
$grupos = array(1, 2, 3, 4, 5);
$animais = array("Avestruz", "Águia", "Burro", "Borboleta", "Cachorro");

echo "Times de Futebol:<br>";
echo "<ol><br>";
foreach($times as $time){
    echo "<li>".$time."</li><br>";
}
echo "</ol><br><br>";

echo "Marcas de tecnologia:<br>";
echo "<ol><br>";
foreach($marcasTech as $marcas){
    echo "<li>".$marcas."</li><br>";
}
echo "</ol><br><br>";

echo "Grupos de números:<br>";
echo "<ol><br>";
foreach($grupos as $grupo){
    echo "<li>".$grupo."</li><br>";
}
echo "</ol><br><br>";

echo "Animais:<br>";
echo "<ol><br>";
foreach($animais as $animal){
    echo "<li>".$animal."</li><br>";
}
echo "</ol><br><br>";