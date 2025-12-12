<?php

namespace App\Mapper;

use App\Model\Sistema;
use App\Model\PadraoLancamento;
use App\Model\PacotesPadrao;
use App\Model\Derivado;

class SistemaMapper {

    public function mapFromDatabaseArrayToObjectArray(array $regArray): array {
        $arrayObj = [];
        foreach ($regArray as $reg) {
            $arrayObj[] = $this->mapFromDatabaseToObject($reg);
        }
        return $arrayObj;
    }

    public function mapFromDatabaseToObject(array $regDatabase): Sistema {
        $obj = new Sistema();

        $obj->setId($regDatabase['id'] ?? null);
        $obj->setNome($regDatabase['nome'] ?? null);
        $obj->setDesenvolvedora($regDatabase['desenvolvedora'] ?? null);
        $obj->setVersao($regDatabase['versao'] ?? null);

        //Relações dos Banco de dados  
        if (!empty($regDatabase['padrao_id'])) {
            $padrao = new PadraoLancamento();
            $padrao->setId($regDatabase['padrao_id']);
            $padrao->setPadraoLancamento($regDatabase['padrao_nome'] ?? null);
            $obj->setPadraoLancamento($padrao);
        }

        if (!empty($regDatabase['pacotes_id'])) {
            $pacote = new PacotesPadrao();
            $pacote->setId($regDatabase['pacotes_id']);
            $pacote->setPacotesPadrao($regDatabase['pacotes_nome'] ?? null);
            $obj->setPacotesPadrao($pacote);
        }

        if (!empty($regDatabase['derivado_id'])) {
            $derivado = new Derivado();
            $derivado->setId($regDatabase['derivado_id']);
            $derivado->setDerivado($regDatabase['derivado_nome'] ?? null);
            $obj->setDerivado($derivado);
        }

        return $obj;
    }

    public function mapFromJsonToObject(array $json): Sistema {
        $obj = new Sistema();

        $obj->setNome($json['nome'] ?? null);
        $obj->setDesenvolvedora($json['desenvolvedora'] ?? null);
        $obj->setVersao($json['versao'] ?? null);

        
        if (!empty($json['padraoLancamento']['id'])) {
            $padrao = new PadraoLancamento();
            $padrao->setId($json['padraoLancamento']['id']);
            $obj->setPadraoLancamento($padrao);
        }

        if (!empty($json['pacotesPadrao']['id'])) {
            $pacote = new PacotesPadrao();
            $pacote->setId($json['pacotesPadrao']['id']);
            $obj->setPacotesPadrao($pacote);
        }

        if (!empty($json['derivado']['id'])) {
            $derivado = new Derivado();
            $derivado->setId($json['derivado']['id']);
            $obj->setDerivado($derivado);
        }

        return $obj;
    }
}
