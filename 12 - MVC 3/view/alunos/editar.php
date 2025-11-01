<?php
include_once(__DIR__ . "/../../controller/AlunoController.php");
$alunoCont = new AlunoController();

$aluno = null;
$msgErro = "";

if(isset($_POST['nome'])){ //Já editou
    //Já clicou no gravar
    //Capturar os valores preenchidos no formulario
    $id      = $_POST["id"];
    $nome    = trim($_POST['nome']) ? trim($_POST['nome']) : NULL; //Retorna se for verdadeiro o proprio Nome se não nulo
    $idade   = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL; //Retorna se for verdadeiro o proprio Idade se não nulo
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']) : NULL; //Retorna se for verdadeiro o proprio Estrangeiro se não nulo
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL; //Retorna se for verdadeiro o proprio curso se não nulo

    //Criar um objeto aluno
    $aluno = new Aluno();
    $aluno->setId($id);
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
    
    if(! $erros)
        header("location: listar.php");
    else{
        $msgErro = implode("<br>",$erros);
    }
    
    $erros = $alunoCont->editar($aluno);

    

} else { //Abriu para editar

    $id = 0;
    if(isset($_GET['id']))
        $id = $_GET['id'];

    $aluno = $alunoCont -> buscarPorID($id);
    if(!$aluno) {
        echo "Aluno não encontrado! <br>";
        echo "<a href='listar.php'> Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");













?>