<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Sistema.php");
include_once(__DIR__ . "/../model/PadraoLancamento.php");
include_once(__DIR__ . "/../model/PacotesPadrao.php");
include_once(__DIR__ . "/../model/Derivado.php");

class SistemaDao {
    private PDO $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list() {
       $sql = "SELECT s.*, 
               pl.id AS id_padrao_lancamento,
               pl.nome AS nome_padrao_lancamento, 
               pp.id AS id_pacotes_padrao,
               pp.nome AS nome_pacotes_padrao, 
               d.id AS id_derivado,
               d.nome AS nome_derivado
        FROM sistemas s
        JOIN padrao_lancamento pl ON pl.id = s.id_padrao_lancamento
        JOIN pacotes_padrao pp ON pp.id = s.id_pacotes_padrao
        JOIN derivados d ON d.id = s.id_derivado";


        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $this->map($result);
    }   

    public function insert(Sistema $sistema){
        try {
            $sql = "INSERT INTO sistemas 
                    (nome, desenvolvedora, versao, id_padrao_lancamento, id_pacotes_padrao, id_derivado)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stm = $this->conn->prepare($sql);
            $stm->execute([
                $sistema->getNome(),
                $sistema->getDesenvolvedora(),
                $sistema->getVersao(),
                $sistema->getPadraoLancamento()?->getId(),
                $sistema->getPacotesPadrao()?->getId(),
                $sistema->getDerivado()?->getId()
        ]);
    } catch (PDOException $e) {
        die("Erro ao inserir Sistema: " . $e->getMessage());
    }
}

    public function delete(int $id) {
        try {
            $sql = "DELETE FROM sistemas WHERE id = ?";
            $stm = $this->conn->prepare($sql);
            $stm->execute([$id]);
        } catch (PDOException $e) {
            die("Erro ao deletar Sistema: " . $e->getMessage());
        }
    }
    public function findById(int $id) {
        $sql = "SELECT s.*, 
                pl.nome AS nome_padrao_lancamento, 
                pp.nome AS nome_pacotes_padrao, 
                d.nome AS nome_derivado
            FROM sistemas s
            JOIN padrao_lancamento pl ON (pl.id = s.id_padrao_lancamento)
            JOIN pacotes_padrao pp ON (pp.id = s.id_pacotes_padrao)
            JOIN derivados d ON (d.id = s.id_derivado)
            WHERE s.id = ?";
        $stm = $this->conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $sistemas = $this->map($result);

        if (count($sistemas) == 1)
            return $sistemas[0];

        return NULL;
}


public function update(Sistema $sistema) {
    try {
        $sql = "UPDATE sistemas 
                   SET nome = ?, 
                       desenvolvedora = ?, 
                       versao = ?, 
                       id_padrao_lancamento = ?, 
                       id_pacotes_padrao = ?, 
                       id_derivado = ? 
                 WHERE id = ?";
        
        $stm = $this->conn->prepare($sql);
        $stm->execute([
            $sistema->getNome(),
            $sistema->getDesenvolvedora(),
            $sistema->getVersao(),
            $sistema->getPadraoLancamento()?->getId(),
            $sistema->getPacotesPadrao()?->getId(),
            $sistema->getDerivado()?->getId(),
            $sistema->getId()
        ]);
    } catch (PDOException $e) {
        die("Erro ao atualizar Sistema: " . $e->getMessage());
    }
}

    private function map(array $result) {
        $sistemas = [];

        foreach ($result as $r) {
            $sistema = new Sistema();
            $sistema->setId($r['id']);
            $sistema->setNome($r['nome']);
            $sistema->setDesenvolvedora($r['desenvolvedora']);
            $sistema->setVersao($r['versao']);

            // Objeto PadraoLancamento
           // Objeto PadraoLancamento
            $padraoLancamento = new PadraoLancamento();
            $padraoLancamento->setId($r['id_padrao_lancamento']);
            $padraoLancamento->setPadraoLancamento($r['nome_padrao_lancamento']); // seu setter
            $sistema->setPadraoLancamento($padraoLancamento);

            // Objeto PacotesPadrao
            $pacotesPadrao = new PacotesPadrao();
            $pacotesPadrao->setId($r['id_pacotes_padrao']);
            $pacotesPadrao->setPacotesPadrao($r['nome_pacotes_padrao']); // seu setter
            $sistema->setPacotesPadrao($pacotesPadrao);

            // Objeto Derivado
            $derivado = new Derivado();
            $derivado->setId($r['id_derivado']);
            $derivado->setDerivado($r['nome_derivado']); // seu setter
            $sistema->setDerivado($derivado);


            $sistemas[] = $sistema;
        }

        return $sistemas;
    }
}

?>
