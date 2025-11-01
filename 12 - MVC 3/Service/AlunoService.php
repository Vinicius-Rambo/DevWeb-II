<?php
include_once(__DIR__ . "/../model/Aluno.php");
class AlunoService{

    public function validar(Aluno $aluno){
        $erros = array();

        //Validadações 
        if(!$aluno->getNome())array_push($erros, "informe o nome!"); 
        if(!$aluno->getIdade())array_push($erros, "informe a idade!"); 
        if(!$aluno->getEstrangeiro())array_push($erros, "informe se você é estrangeiro!"); 
        if(!$aluno->getCurso())array_push($erros, "informe o seu curso!"); 
         
        return $erros;
    }
}




?>