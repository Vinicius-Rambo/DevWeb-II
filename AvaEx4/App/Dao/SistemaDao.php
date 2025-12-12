<?php

namespace App\Dao;

use App\Util\Connection;
use App\Mapper\SistemaMapper;
use App\Model\Sistema;
use \PDOException;
use \Exception;

class SistemaDao {

    private $conn;
    private $mapper;

    public function __construct() {
        $this->conn = Connection::getConnection();
        $this->mapper = new SistemaMapper();
    }

    // LISTAR TODOS
    public function list() {
        $sql = "SELECT s.*, 
               p.id as padrao_id, p.nome as padrao_nome,
               pac.id as pacotes_id, pac.nome as pacotes_nome,
               d.id as derivado_id, d.nome as derivado_nome
        FROM sistemas s
        JOIN padrao_lancamento p ON s.id_padrao_lancamento = p.id
        JOIN pacotes_padrao pac ON s.id_pacotes_padrao = pac.id
        JOIN derivados d ON s.id_derivado = d.id
        ORDER BY s.id";


        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $this->mapper->mapFromDatabaseArrayToObjectArray($result);
    }

    // BUSCAR POR ID
    public function findById(int $id) {
        $sql = "SELECT s.*, 
               p.id as padrao_id, p.nome as padrao_nome,
               pac.id as pacotes_id, pac.nome as pacotes_nome,
               d.id as derivado_id, d.nome as derivado_nome
        FROM sistemas s
        JOIN padrao_lancamento p ON s.id_padrao_lancamento = p.id
        JOIN pacotes_padrao pac ON s.id_pacotes_padrao = pac.id
        JOIN derivados d ON s.id_derivado = d.id
        WHERE s.id = :id";


        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $arrayObj = $this->mapper->mapFromDatabaseArrayToObjectArray($result);

        if (count($arrayObj) === 0)
            return null;
        else if (count($arrayObj) > 1)
            throw new Exception("Mais de um registro encontrado para o ID " . $id);

        return $arrayObj[0];
    }

    // INSERIR
    public function insert(Sistema $sistema) {
        $sql = "INSERT INTO sistemas 
                (nome, desenvolvedora, versao, id_padrao_lancamento, id_pacotes_padrao, id_derivado)
                VALUES (:nome, :desenvolvedora, :versao, :padrao, :pacotes, :derivado)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("nome", $sistema->getNome());
        $stmt->bindValue("desenvolvedora", $sistema->getDesenvolvedora());
        $stmt->bindValue("versao", $sistema->getVersao());
        $stmt->bindValue("padrao", $sistema->getPadraoLancamento()?->getId());
        $stmt->bindValue("pacotes", $sistema->getPacotesPadrao()?->getId());
        $stmt->bindValue("derivado", $sistema->getDerivado()?->getId());
        $stmt->execute();

        $id = $this->conn->lastInsertId();
        $sistema->setId($id);

        return $sistema;
    }

    // ATUALIZAR
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
        $stmt->bindValue("padrao", $sistema->getPadraoLancamento()?->getId());
        $stmt->bindValue("pacotes", $sistema->getPacotesPadrao()?->getId());
        $stmt->bindValue("derivado", $sistema->getDerivado()?->getId());
        $stmt->bindValue("id", $sistema->getId());
        $stmt->execute();

        return $sistema;
    }

    // DELETAR
    public function deleteById(int $id) {
        $sql = "DELETE FROM sistemas WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
    }
}
