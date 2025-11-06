<?php
include_once(__DIR__ . "/../dao/AlunoDao.php"); //Forma absoluta
include_once(__DIR__ . "/../Service/AlunoService.php");

    class AlunoController{ //Class de controle

        private AlunoDao $alunoDao;
        private AlunoService $alunoService;

        public function __construct(){
            $this->alunoDao = new AlunoDao();
            $this->alunoService = new AlunoService();
        }

        public function listar() {
            return $this->alunoDao->list();
        }

        public function inserir(Aluno $aluno){
            //validar os dados
            $erros = $this->alunoService->validar($aluno);
            
            if(!$erros){
                $this->alunoDao->insert($aluno);
            }
            return $erros; 
        }
        public function buscarPorId(int $id){
            return $this->alunoDao->findByid($id);
        }
        
        public function editar(Aluno $aluno){
            //validar os dados
            $erros = $this->alunoService->validar($aluno);
            if(!$erros){
                $this->alunoDao->update($aluno);
            }
            return $erros; 
        }


        public function deletar(int $id){
            return $this->alunoDao->delete($id);
        }

    }
?>