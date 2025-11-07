<?php

class PadraoLancamento {
    private ?int $id;
    private ?string $padraoLancamento;

    // Getter e Setter: id
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;
        
        return $this;
    }

    // Getter e Setter: padraoLancamento
    public function getPadraoLancamento(): ?string {
        return $this->padraoLancamento;
    }

    public function setPadraoLancamento(?string $padraoLancamento): self {
        $this->padraoLancamento = $padraoLancamento;
        
        return $this;
    }
}
