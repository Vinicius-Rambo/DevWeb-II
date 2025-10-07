<?php
class Pessoa{
    private string $nome;
    private string $sobrenome;


    public function __construct($nome="", $sobrenome=""){
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
    }

    //Nome
    public function getNome(): string{
        return $this->nome;
    }
    
    public function setNome(string $nome): self{
        $this->nome = $nome;

        return $this;
    }
    //Sobrenome
    public function getSobrenome(): string{
        return $this->sobrenome;
    }
   
    public function setSobrenome(string $sobrenome): self{
        $this->sobrenome = $sobrenome;
        return $this;
    }
}