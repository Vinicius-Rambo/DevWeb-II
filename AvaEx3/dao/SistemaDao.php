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
      //Select de todos os campos da tabela Sistema, que utiliza 3 FK.
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
        $result = $stm->fetchAll();

        return $this->map($result);
    }   

    public function insert(Sistema $sistema){
        try {
            $sql = "INSERT INTO sistemas 
                    (nome, desenvolvedora, versao, id_padrao_lancamento, id_pacotes_padrao, id_derivado)
                    VALUES (?, ?, ?, ?, ?, ?)"; //Esses "?" são para impedir o SQL-Injection  
            $stm = $this->conn->prepare($sql);
            $stm->execute([ //Os valores inseridos vem de dentro do Objeto sistema. 
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
            $sql = "DELETE FROM sistemas WHERE id = ?"; //Deleta um unico item usando o ID que é passado.
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
    try { //Tenta atualizar o sistema, se não conseguir retorna o Erro.
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
            $padraoLancamento = new PadraoLancamento();
            $padraoLancamento->setId($r['id_padrao_lancamento']);
            $padraoLancamento->setPadraoLancamento($r['nome_padrao_lancamento']); 
            $sistema->setPadraoLancamento($padraoLancamento); //Pega os valores dos objetos e adiciona ao Sistema, por serem tableas

            // Objeto PacotesPadrao
            $pacotesPadrao = new PacotesPadrao();
            $pacotesPadrao->setId($r['id_pacotes_padrao']);
            $pacotesPadrao->setPacotesPadrao($r['nome_pacotes_padrao']); 
            $sistema->setPacotesPadrao($pacotesPadrao); //Pega os valores dos objetos e adiciona ao Sistema

            // Objeto Derivado
            $derivado = new Derivado();
            $derivado->setId($r['id_derivado']);
            $derivado->setDerivado($r['nome_derivado']); 
            $sistema->setDerivado($derivado); //Pega os valores dos objetos e adiciona ao Sistema


            $sistemas[] = $sistema; //Retorna todos o sistema dentro de um array
        }

        return $sistemas; //retorna o Array com todos os sistema dentro.
    }
}

?>
