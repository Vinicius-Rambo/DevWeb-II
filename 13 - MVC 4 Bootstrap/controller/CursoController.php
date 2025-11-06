<?php
include_once(__DIR__ . "/../dao/CursoDao.php"); //Forma absoluta
class CursoController {

    private CursoDao $cursoDao;

    public function __construct(){ //Construtor do objeto cursoDao que vem da pasta DAO
        $this->cursoDao = new CursoDao();
    }

    public function listar(){
        return $this->cursoDao->list(); //Retoran um array associativo vindo do banco52
    }
}


?>