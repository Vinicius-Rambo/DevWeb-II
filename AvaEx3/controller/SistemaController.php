<?php
include_once(__DIR__ . "/../dao/SistemaDao.php");
    class SistemaController{

        private SistemaDao $sistemaDao;

        public function __construct(){
            $this->sistemaDao = new SistemaDao();
        }
        public function listar(){
            return $this->sistemaDao->list();
        }
    }
?>