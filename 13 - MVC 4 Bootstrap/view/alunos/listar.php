<?php

include_once(__DIR__ . "/../../controller/AlunoController.php"); //Caminho absoluto

$alunoCont = new AlunoController(); //Declara o objeto
$alunos = $alunoCont -> listar(); //Chama o metodo listar
//print_r($alunos); //Teste

include_once(__DIR__ . "/../include/header.php"); //Caminho absoluto
include_once(__DIR__ . "/../include/menu.php"); //Caminho absoluto

?>

<h3>Listagem de Alunos</h3> 

<div>
    <a href="inserir.php" class="btn btn-primary">Inserir</a> <!--Usando Bootstrap-->
</div>

<table class="table table-striped">
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
            <td><?= $a->getId()?></td>
            <td><?= $a->getNome()?></td>
            <td><?= $a->getIdade()?></td>
            <td><?= $a->getAlunoDesc()?></td>
            <td><?= $a->getCurso()->getNomeTurno()?></td>
            <td><a onclick="return confirm('Confirma a edição?')" href="editar.php?id=<?= $a->getId() ?>"> <img src="../../img/btn_editar.png"></a></td>
            <td><a onclick="return confirm('Confirma a exclusão?')" href="excluir.php?id=<?= $a->getId() ?>"> <img src="../../img/btn_excluir.png"></a></td>
        </tr>
    <?php endforeach; ?>    
   
</table>

<?php

include_once(__DIR__ . "/../include/footer.php"); //Caminho absoluto
?>
