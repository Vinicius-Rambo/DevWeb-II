<?php
include_once("Pessoa.php");

$p1 = new Pessoa();
$p1->setNome("Mauro");
$p1->setSobrenome("Alberto");

$p2 = new Pessoa("Mari", "Joana" );
$p3 = new Pessoa("Linux", "Torvald" );

echo $p1->getNome() . " " . $p1->getSobrenome() . "<br>"; 
echo $p2->getNome() . " " . $p2->getSobrenome() . "<br>"; 
echo $p3->getNome() . " " . $p3->getSobrenome() . "<br>"; 










?>