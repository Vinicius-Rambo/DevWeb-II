<?php
include_once(__DIR__ . "/../dao/SistemaDao.php");
include_once(__DIR__ . "/../service/SistemaService.php");

class SistemaController {

    private SistemaDao $sistemaDao;
    private SistemaService $sistemaService;

    public function __construct() { //metodo construtor do objeto.
        $this->sistemaDao = new SistemaDao();
        $this->sistemaService = new SistemaService();
    }

    //Metodos do controller.
    public function listar() {
        return $this->sistemaDao->list();
    }

    public function inserir(Sistema $sistema) {
        $erros = $this->sistemaService->validar($sistema); // Validar os dados e adicionar aos erros
        if (empty($erros)) { //se não houver erros chama o inserir do  DAO.
            $this->sistemaDao->insert($sistema);
        }
        return $erros;
    }

    public function buscarPorId(int $id) {
        return $this->sistemaDao->findById($id);
    }

    public function editar(Sistema $sistema) {
        // Validar os dados
        $erros = $this->sistemaService->validar($sistema); //Metodo de validação
        if (empty($erros)) { //se não houver erros chama o Dao de update
            $this->sistemaDao->update($sistema);
        }
        return $erros;
    }

    public function deletar(int $id) {
        return $this->sistemaDao->delete($id); //Chama o DAO deletar passando o ID  
    }
}
?>
