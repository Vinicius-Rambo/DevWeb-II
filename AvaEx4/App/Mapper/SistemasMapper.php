<?php

namespace App\Mapper;

use App\Model\Sistema;
use App\Model\PadraoLancamento;
use App\Model\PacotesPadrao;
use App\Model\Derivado;

class SistemaMapper {

    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = [];

        foreach ($regArray as $reg) {
            $arrayObj[] = $this->mapFromDatabaseToObject($reg);
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
        $obj = new Sistema();

        if (isset($regDatabase['id']))
            $obj->setId($regDatabase['id']);

        if (isset($regDatabase['nome']))
            $obj->setNome($regDatabase['nome']);

        if (isset($regDatabase['desenvolvedora']))
            $obj->setDesenvolvedora($regDatabase['desenvolvedora']);

        if (isset($regDatabase['versao']))
            $obj->setVersao($regDatabase['versao']);

        // ------------ OBJETOS INTERNOS ---------------

        if (isset($regDatabase['padraoLancamento']) && is_array($regDatabase['padraoLancamento'])) {
            $padrao = new PadraoLancamento();
            foreach ($regDatabase['padraoLancamento'] as $field => $value) {
                $setter = "set" . ucfirst($field);
                if (method_exists($padrao, $setter)) {
                    $padrao->$setter($value);
                }
            }
            $obj->setPadraoLancamento($padrao);
        }

        if (isset($regDatabase['pacotesPadrao']) && is_array($regDatabase['pacotesPadrao'])) {
            $pacote = new PacotesPadrao();
            foreach ($regDatabase['pacotesPadrao'] as $field => $value) {
                $setter = "set" . ucfirst($field);
                if (method_exists($pacote, $setter)) {
                    $pacote->$setter($value);
                }
            }
            $obj->setPacotesPadrao($pacote);
        }

        if (isset($regDatabase['derivado']) && is_array($regDatabase['derivado'])) {
            $derivado = new Derivado();
            foreach ($regDatabase['derivado'] as $field => $value) {
                $setter = "set" . ucfirst($field);
                if (method_exists($derivado, $setter)) {
                    $derivado->$setter($value);
                }
            }
            $obj->setDerivado($derivado);
        }

        return $obj;
    }

    public function mapFromJsonToObject($json) {
        return $this->mapFromDatabaseToObject($json);
    }
}
