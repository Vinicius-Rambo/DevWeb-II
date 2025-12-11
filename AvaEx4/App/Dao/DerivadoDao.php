<?php

namespace App\Dao;

use App\Util\Connection;
use App\Model\Derivado;
use PDO;

class DerivadoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM derivados ORDER BY nome";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM derivados WHERE id = ?";
        $stm = $this->conn->prepare($sql);
        $stm->execute([$id]);

        $result = $stm->fetchAll();
        $objs = $this->map($result);

        if (count($objs) === 1)
            return $objs[0];

        return null;
    }

    private function map(array $result) {
        $arr = [];

        foreach ($result as $r) {
            $d = new Derivado();
            $d->setId($r['id']);
            $d->setDerivado($r['nome']);

            $arr[] = $d;
        }

        return $arr;
    }
}
