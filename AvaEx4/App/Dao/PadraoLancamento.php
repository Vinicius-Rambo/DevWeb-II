<?php

namespace App\Dao;

use App\Util\Connection;
use App\Model\PadraoLancamento;
use PDO;

class PadraoLancamentoDao {

    private PDO $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM padrao_lancamento ORDER BY nome";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM padrao_lancamento WHERE id = ?";
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
            $p = new PadraoLancamento();
            $p->setId($r['id']);
            $p->setPadraoLancamento($r['nome']);

            $arr[] = $p;
        }

        return $arr;
    }
}
