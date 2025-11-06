<?php

use Dba\Connection;

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

        foreach($result as $r){
            $sistema = new Sistema();
            $sistema = setId($s['id']);
            $sistema = setNome($s['nome']);
            $sistema = setDesenvolvedora($s['desenvolvedora']);
            $sistema = setVersao($s['versao']);
            $sistema = setPadraoLancamento($s['padraoLancamento']);
            $sistema = setPacotesPadrao($s['padraoPacotes']);
            $sistema = setDerivado($s['derivado']);
        }
    }


}






?>