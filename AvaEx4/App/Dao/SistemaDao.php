<?php

namespace App\Dao;

use App\Util\Connection;
use App\Mapper\SistemaMapper;
use App\Model\Sistema;

use \Exception;

class sistemaDao {

    private $conn;
    private $mapper;

    public function __construct() {
        $this->conn = Connection::getConnection();
        $this->mapper = new SistemaMapper();
    }

    public function list() {
        $sql = "SELECT * FROM sistemas ORDER BY id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $this->mapper->mapFromDatabaseArrayToObjectArray($result);
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM sistemas WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $arrayObj = $this->mapper->mapFromDatabaseArrayToObjectArray($result);

        if (count($arrayObj) == 0)
            return null;
        else if (count($arrayObj) > 1)
            throw new Exception("Mais de um registro encontrado para o ID " . $id);

        return $arrayObj[0];
    }

    public function insert(Sistema $sistema) {
        $sql = "INSERT INTO sistemas 
                (nome, desenvolvedora, versao, id_padrao_lancamento, id_pacotes_padrao, id_derivado)
                VALUES (:nome, :desenvolvedora, :versao, :padrao, :pacotes, :derivado)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("nome", $sistema->getNome());
        $stmt->bindValue("desenvolvedora", $sistema->getDesenvolvedora());
        $stmt->bindValue("versao", $sistema->getVersao());
        $stmt->bindValue("padrao", $sistema->getIdPadraoLancamento());
        $stmt->bindValue("pacotes", $sistema->getIdPacotesPadrao());
        $stmt->bindValue("derivado", $sistema->getIdDerivado());
        $stmt->execute();

        $id = $this->conn->lastInsertId();
        $sistema->setId($id);

        return $sistema;
    }

    public function update(Sistema $sistema) {
        $sql = "UPDATE sistemas SET 
                    nome = :nome, 
                    desenvolvedora = :desenvolvedora, 
                    versao = :versao,
                    id_padrao_lancamento = :padrao,
                    id_pacotes_padrao = :pacotes,
                    id_derivado = :derivado
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("nome", $sistema->getNome());
        $stmt->bindValue("desenvolvedora", $sistema->getDesenvolvedora());
        $stmt->bindValue("versao", $sistema->getVersao());
        $stmt->bindValue("padrao", $sistema->getIdPadraoLancamento());
        $stmt->bindValue("pacotes", $sistema->getIdPacotesPadrao());
        $stmt->bindValue("derivado", $sistema->getIdDerivado());
        $stmt->bindValue("id", $sistema->getId());
        $stmt->execute();

        return $sistema;
    }

    public function deleteById(int $id) {
        $sql = "DELETE FROM sistemas WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
    }

}
