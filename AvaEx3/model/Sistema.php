<?php
include_once(__DIR__ . "/Derivado.php");
include_once(__DIR__ . "/PacotesPadrao.php.php");
include_once(__DIR__ . "/PadraoLancamento.php.php");

class Sistema{
    private ?int $id;
    private ?string $nome;
    private ?string $desenvolvedora;
    private ?string $versao;
    private ?PadraoLancamento $padraoLancamento;
    private ?PacotesPadrao $pacotesPadrao;
    private ?Derivado $derivado;
}

