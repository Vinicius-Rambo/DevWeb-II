<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Sistema.php");

class SistemaDao{
    private PDO $conn;

    public function __construct(){
        $this -> conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT s.*, 
            pl.padrao_lancamento AS nome_padrao_lancamento, 
            pp.pacotes_padrao AS nome_pacotes_padrao, 
            d.derivados AS nome_derivados
            FROM sistemas s
            JOIN padrao_lancamento pl ON(pl.id_lancamento = s.padrao_lancamento)
            JOIN pacotes_padrao pp ON(pp.id_padrao = s.pacotes_padrao)
            JOIN derivados d ON(d.id_derivados = s.derivados)";
    
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result); // Método de mapeamento de objetos
    }   

    private function map(array $result){ //De array Assoc para objeto
        $sistemas = array(); //Array sistemas

         foreach ($result as $r) {
            $sistema = new Sistema();
            $sistema->setId($r['id']);
            $sistema->setNome($r['nome']);
            $sistema->setDesenvolvedora($r['desenvolvedora']);
            $sistema->setVersao($r['versao']);

            // cria os objetos relacionados igual ao exemplo do professor fez com curso em aluno.
            $padraoLancamento = new PadraoLancamento();
            $padraoLancamento->setId($r['id_padrao_lancamento']);
            $padraoLancamento->setPadraoLancamento($r['nome_padrao_lancamento']);
            $sistema->setPadraoLancamento($padraoLancamento);

            $pacotesPadrao = new PacotesPadrao();
            $pacotesPadrao->setId($r['id_pacotes_padrao']);
            $pacotesPadrao->setPacotesPadrao($r['nome_pacotes_padrao']);
            $sistema->setPacotesPadrao($pacotesPadrao);

            $derivado = new Derivado();
            $derivado->setId($r['id_derivado']);
            $derivado->setDerivado($r['nome_derivado']);
            $sistema->setDerivado($derivado);

            array_push($sistemas, $sistema);
        }

        return $sistemas;
    }
}









?>