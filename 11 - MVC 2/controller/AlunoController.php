<?php
include_once(__DIR__ . "/../dao/AlunoDao.php"); //Forma absoluta
    class AlunoController{ //Class de controle

        private AlunoDao $alunoDao;

        public function __construct(){
            $this->alunoDao = new AlunoDao();
        }

        public function listar() {
            return $this->alunoDao->list();
        }

        public function inserir(Aluno $aluno){
            return $this->alunoDao->insert($aluno);
        }

        public function deletar(int $id){
            return $this->alunoDao->delete($id);
        }

    }
?>