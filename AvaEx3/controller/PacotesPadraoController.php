<?php 
include_once(__DIR__ . "/../dao/PacotesPadraoDao.php");
class PacotesPadraoController{
    private PacotesPadraoDao $pacotesPadraoDao;

    public function __construct(){ //metodo construtor do objeto.
        $this->pacotesPadraoDao = new PacotesPadraoDao();
    }

    public function listar(){
        return $this->pacotesPadraoDao->list();//Retorna um array associativo vindo do banco
    }
}
