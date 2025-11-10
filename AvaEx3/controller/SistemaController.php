<?php
include_once(__DIR__ . "/../dao/SistemaDao.php");
include_once(__DIR__ . "/../service/SistemaService.php");

class SistemaController {

    private SistemaDao $sistemaDao;
    private SistemaService $sistemaService;

    public function __construct() {
        $this->sistemaDao = new SistemaDao();
        $this->sistemaService = new SistemaService();
    }

    public function listar() {
        return $this->sistemaDao->list();
    }

    public function inserir(Sistema $sistema) {
        // Validar os dados
        $erros = $this->sistemaService->validar($sistema);
        
        if (empty($erros)) {
            $this->sistemaDao->insert($sistema);
        }
        return $erros;
    }

    public function buscarPorId(int $id) {
        return $this->sistemaDao->findById($id);
    }

    public function editar(Sistema $sistema) {
        // Validar os dados
        $erros = $this->sistemaService->validar($sistema);
        if (empty($erros)) {
            $this->sistemaDao->update($sistema);
        }
        return $erros;
    }

    public function deletar(int $id) {
        return $this->sistemaDao->delete($id);
    }
}
?>
