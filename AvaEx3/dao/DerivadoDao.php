<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Derivado.php");

class DerivadoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM derivados ORDER BY derivado";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->map($result);
    }

    private function map(array $result) {
        $derivados = array();

        foreach ($result as $r) {
            $derivado = new Derivado();
            $derivado->setId($r['id']);
            $derivado->setDerivado($r['derivado']);

            array_push($derivados, $derivado);
        }

        return $derivados;
    }
}

