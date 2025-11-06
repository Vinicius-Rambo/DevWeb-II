<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/PacotesPadrao.php");

class PacotesPadraoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM pacotes_padrao ORDER BY pacotes_padrao";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->map($result);
    }

    private function map(array $result) {
        $pacotes = array();

        foreach ($result as $r) {
            $pacote = new PacotesPadrao();
            $pacote->setId($r['id']);
            $pacote->setPacotesPadrao($r['pacotes_padrao']);

            array_push($pacotes, $pacote);
        }

        return $pacotes;
    }
}
