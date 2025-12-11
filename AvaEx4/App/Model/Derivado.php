<?php

namespace app\model;

class Derivado {    
    private ?int $id;
    private ?string $derivado; 

    // getter e setter: id
    public function getid(): ?int {
        return $this->id;
    }

    public function setid(?int $id): self {
        $this->id = $id;

        return $this;
    }

    // getter e setter: derivado
    public function getderivado(): ?string {
        return $this->derivado;
    }

    public function setderivado(?string $derivado): self {
        $this->derivado = $derivado;
    
        return $this;
    }
}
