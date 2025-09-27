<?php

class Calculadora {
    //Atributos
    private int $num1;
    private int $num2;

    //Construtor
    public function __construct($num1=0,$num2=0){ //Com valores para poder chamar vazio.
        $this->num1 = $num1;
        $this->num2 = $num2;
    }
    
    //Método
    public function soma(){
        $soma = $this->num1 + $this->num2; //Obrigatorio usar o this
        return $soma;

    }
    //Getter e Setter.
    //Num1     
    public function getNum1(): int{
        return $this->num1;
    }
 
    public function setNum1(int $num1): self{
        $this->num1 = $num1;
        return $this;
    }

    //Num2
    public function getNum2(): int{
        return $this->num2;
    }

    public function setNum2(int $num2): self{
        $this->num2 = $num2;
        return $this;
    }
}











?>