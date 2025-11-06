<?php 
include_once(__DIR__ . "/../dao/DerivadoDao.php");
class DerivadoController{
    private DerivadoDao $derivadoDao;

    public function __construct(){
        $this->derivadoDao = new DerivadoDao();
    }

    public function listar(){
        return $this->derivadoDao->list();//Retorna um array associativo vindo do banco
    }
}