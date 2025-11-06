<?php

class Derivado {
    private ?int $id;
    private ?string $derivado; 

    // Getter e Setter: id
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;

        return $this;
    }

    // Getter e Setter: derivado
    public function getDerivado(): ?string {
        return $this->derivado;
    }

    public function setDerivado(?string $derivado): self {
        $this->derivado = $derivado;
    
        return $this;
    }
}
