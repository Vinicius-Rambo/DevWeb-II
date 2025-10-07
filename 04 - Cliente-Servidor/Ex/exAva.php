<?php

echo "Progressão Aritmetica<br>";

function PA($n, $r, $qtd){
    for($i = 0; $i < $qtd; $i++){
        echo $n . "<br>";
        $n = $n + $r;    
    }
}

$inicio = $_GET["inicio"];
$razao = $_GET["razao"];
$quantidade = $_GET["quantidade"];

if(isset($_GET["inicio"]) == false){
    echo "Número inicial não encontrado<br>";
}

if(isset($_GET["razao"]) == false){
    echo "Número da razao não encontrado<br>";
}

if(isset($_GET["quantidade"]) == false){
    echo "Número da quantidade não encontrado<br>";
}

if(isset($_GET["inicio"]) && isset($_GET["razao"]) && isset($_GET["quantidade"])){
    PA($inicio, $razao, $quantidade);
}

?>
