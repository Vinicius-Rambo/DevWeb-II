<?php

namespace App\Model;

use \JsonSerializable;
use \App\Model\PadraoLancamento;
use \App\Model\PacotesPadrao;
use \App\Model\Derivado;

class Sistema implements JsonSerializable {
    private ?int $id = null;
    private ?string $nome = null;
    private ?string $desenvolvedora = null;
    private ?string $versao = null;
    private ?PadraoLancamento $padraoLancamento = null;
    private ?PacotesPadrao $pacotesPadrao = null;
    private ?Derivado $derivado = null; 
    
    public function __construct() {
        $this->id = 0; 
        $this->nome = null; 
        $this->desenvolvedora = null; 
        $this->versao = null; 
        $this->padraoLancamento = null; 
        $this->pacotesPadrao = null; 
        $this->derivado = null; 
    }

    // JSON retorna apenas os IDs das relações
    public function jsonSerialize(): array {
        return [
            "id" => $this->id,
            "nome" => $this->nome,
            "desenvolvedora" => $this->desenvolvedora,
            "versao" => $this->versao,
            "padraoLancamento" => $this->padraoLancamento?->getId(),
            "pacotesPadrao" => $this->pacotesPadrao?->getId(),
            "derivado" => $this->derivado?->getId()
        ];
    }
    
    // Getter e Setter: id
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

    // Getter e Setter: nome
    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(?string $nome): self {
        $this->nome = $nome;
        return $this;
    }

    // Getter e Setter: desenvolvedora
    public function getDesenvolvedora(): ?string {
        return $this->desenvolvedora;
    }

    public function setDesenvolvedora(?string $desenvolvedora): self {
        $this->desenvolvedora = $desenvolvedora;
        return $this;
    }

    // Getter e Setter: versao
    public function getVersao(): ?string {
        return $this->versao;
    }

    public function setVersao(?string $versao): self {
        $this->versao = $versao;
        return $this;
    }

    // Getter e Setter: padraoLancamento
    public function getPadraoLancamento(): ?PadraoLancamento {
        return $this->padraoLancamento;
    }

    public function setPadraoLancamento(?PadraoLancamento $padraoLancamento): self {
        $this->padraoLancamento = $padraoLancamento;
        return $this;
    }

    // Getter e Setter: pacotesPadrao
    public function getPacotesPadrao(): ?PacotesPadrao {
        return $this->pacotesPadrao;
    }

    public function setPacotesPadrao(?PacotesPadrao $pacotesPadrao): self {
        $this->pacotesPadrao = $pacotesPadrao;
        return $this;
    }

    // Getter e Setter: derivado
    public function getDerivado(): ?Derivado {
        return $this->derivado;
    }

    public function setDerivado(?Derivado $derivado): self {
        $this->derivado = $derivado;
        return $this;
    }
}
