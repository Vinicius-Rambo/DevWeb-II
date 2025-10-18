<?php
include_once(__DIR__ . "/Curso.php"); //Caminho Absoluto

class Aluno{
    //Atributos
    private ?int $id; //Pode ser inteiro ou null
    private ?string $nome;
    private ?int $idade;
    private ?string $estrangeiro;
    private ?Curso $curso; //Usando o objeto do curso

    //Metodos
    public function getAlunoDesc(){
        if($this->estrangeiro == 'S') return "Sim";
         elseif($this->estrangeiro == 'N') return "Não";

    return "";     
    }

  

    //Getter e Setters
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getIdade(): ?int
    {
        return $this->idade;
    }

    public function setIdade(?int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    public function getEstrangeiro(): ?string
    {
        return $this->estrangeiro;
    }

    public function setEstrangeiro(?string $estrangeiro): self
    {
        $this->estrangeiro = $estrangeiro;

        return $this;
    }

    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    public function setCurso(?Curso $curso): self
    {
        $this->curso = $curso;

        return $this;
    }
}