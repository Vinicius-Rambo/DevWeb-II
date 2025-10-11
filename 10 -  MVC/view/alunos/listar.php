<?php

include_once(__DIR__ . "/../../controller/AlunoController.php"); //Caminho absoluto

$alunoCont = new AlunoController(); //Declara o objeto
$alunos = $alunoCont -> listar(); //Chama o metodo listar
//print_r($alunos); //Teste

include_once(__DIR__ . "/../include/header.php"); //Caminho absoluto

?>

<h3>Listagem de Alunos</h3> 

<div>
    <a href="inserir.php">Inserir</a>
</div>

<table>
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>Curso</th>
        <th></th>
        <th></th>
    </tr>

    <!-- Dados -->
    <?php foreach($alunos as $a): ?>
        <tr>
            <th><?= $a->getId()?></th>
            <th><?= $a->getNome()?></th>
            <th><?= $a->getIdade()?></th>
            <th><?= $a->getAlunoDesc()?></th>
            <th><?= $a->getCurso()->getNomeTurno()?></th>
            <th></th>
            <th></th>
        </tr>
    <?php endforeach; ?>    
   
</table>

<?php

include_once(__DIR__ . "/../include/footer.php"); //Caminho absoluto
?>
