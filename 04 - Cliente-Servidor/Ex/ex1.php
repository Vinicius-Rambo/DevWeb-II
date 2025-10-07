<?php

echo "3 parametros com POST<br><br>";

$nome = $_POST["nome"];
$sobrenome  = $_POST["sobrenome"];
$idade = $_POST["idade"];

echo "<span style = 'font-weight: bold'> Nome Completo: </span>" . $nome . $sobrenome . "<br>";
echo "<span style = 'font-weight: bold'> Idade: </span>" . $idade;




?>