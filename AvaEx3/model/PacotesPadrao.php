<?php

class PacotesPadrao {
    private ?int $id;
    private ?string $pacotesPadrao;

    // Getter e Setter: id
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;

        return $this;
    }

    // Getter e Setter: pacotesPadrao
    public function getPacotesPadrao(): ?string {
        return $this->pacotesPadrao;
    }

    public function setPacotesPadrao(?string $pacotesPadrao): self {
        $this->pacotesPadrao = $pacotesPadrao;

        return $this;
    }
}
