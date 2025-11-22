<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/PadraoLancamento.php");

class PadraoLancamentoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
       $sql = "SELECT * FROM padrao_lancamento ORDER BY nome"; //Comando SQL dentro do Banco

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    private function map(array $result) {
        $lancamentos = array();

        foreach ($result as $r) {
            $padrao = new PadraoLancamento();
            $padrao->setId($r['id']);
            $padrao->setPadraoLancamento($r['nome']);

            array_push($lancamentos, $padrao); //pega os valores do objeto padrao e adiciona no array lancamentos. 
        }

        return $lancamentos;
    }
}
