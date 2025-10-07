<?php
class Livro{
    private string $titulo;
    private string $autor;
    private string $genero;
    private int $qtdPaginas;

    public function __construct($titulo="", $autor="", $genero="", $qtdPaginas=0){
    $this->titulo = $titulo;
    $this->autor = $autor;
    $this->genero = $genero;
    $this->qtdPaginas = $qtdPaginas;
    }

    //Titulo
    public function getTitulo(): string{
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self{
        $this->titulo = $titulo;
        return $this;
    }

    //Autor
    public function getAutor(): string{
        return $this->autor;
    }

    public function setAutor(string $autor): self{
        $this->autor = $autor;

        return $this;
    }

    //Genero
    public function getGenero(): string{
        return $this->genero;
    }


    public function setGenero(string $genero): self{
        $this->genero = $genero;
        return $this;
    }

    //QtdPaginas
    public function getQtdPaginas(): int{
        return $this->qtdPaginas;
    }

    public function setQtdPaginas(int $qtdPaginas): self{
        $this->qtdPaginas = $qtdPaginas;
        return $this;
    }
}

