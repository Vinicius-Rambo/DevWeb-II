<?php
    //criar um ojeto da classe calculadora

    include_once("Calculadora.php");
    
    $calc = new Calculadora(5,8);
    //$calc->setNum1(5);
    //$calc->setNum2(8);

    echo $calc->soma();




?>