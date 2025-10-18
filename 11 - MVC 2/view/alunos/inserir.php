<?php
include_once(__DIR__ . "/../../model/Aluno.php");
include_once(__DIR__ . "/../../controller/AlunoController.php");

//Verificar se o usuario clicou no gravar
if(isset($_POST['nome'])){ //Capturar os valores preenchidos no formulario
    $nome    = trim($_POST['nome']) ? trim($_POST['nome']) : NULL; //Retorna se for verdadeiro o proprio Nome se não nulo
    $idade   = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL; //Retorna se for verdadeiro o proprio Idade se não nulo
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']) : NULL; //Retorna se for verdadeiro o proprio Estrangeiro se não nulo
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL; //Retorna se for verdadeiro o proprio curso se não nulo

    //Criar um objeto aluno
    $aluno = new Aluno();
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrang);

    if($idCurso){
        $curso = new Curso(); //Objeto curso
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    }
    else{ 
        $aluno->setCurso(NULL);
    }
    
    $alunoCont = new AlunoController();
    $alunoCont->inserir($aluno);

    header("location: listar.php");
}
    
include_once(__DIR__ . "/form.php");


?>