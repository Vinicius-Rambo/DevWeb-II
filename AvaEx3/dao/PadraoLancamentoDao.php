<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/PadraoLancamento.php");

class PadraoLancamentoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM padrao_lancamento ORDER BY padrao_lancamento";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->map($result);
    }

    private function map(array $result) {
        $lancamentos = array();

        foreach ($result as $r) {
            $padrao = new PadraoLancamento();
            $padrao->setId($r['id']);
            $padrao->setPadraoLancamento($r['padrao_lancamento']);

            array_push($lancamentos, $padrao);
        }

        return $lancamentos;
    }
}
