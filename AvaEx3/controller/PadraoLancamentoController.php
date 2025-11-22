<?php 
include_once(__DIR__ . "/../dao/PadraoLancamentoDao.php");
class PadraoLancamentoController{
    private PadraoLancamentoDao $padraoLancamentoDao;

    public function __construct(){ //metodo construtor do objeto.
        $this->padraoLancamentoDao = new PadraoLancamentoDao();
    }

    public function listar(){
        return $this->padraoLancamentoDao->list();//Retorna um array associativo vindo do banco
    }
}
