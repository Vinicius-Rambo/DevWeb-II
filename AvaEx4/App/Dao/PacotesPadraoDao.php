<?php

namespace App\Dao;

use App\Util\Connection;
use App\Model\PacotesPadrao;
use PDO;

class PacotesPadraoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM pacotes_padrao ORDER BY nome";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM pacotes_padrao WHERE id = ?";
        $stm = $this->conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $objs = $this->map($result);

        if(count($objs) === 1)
            return $objs[0];

        return null;
    }

    private function map(array $result) {
        $arr = [];

        foreach ($result as $r) {
            $p = new PacotesPadrao();
            $p->setId($r['id']);
            $p->setPacotesPadrao($r['nome']);

            $arr[] = $p;
        }

        return $arr;
    }
}

