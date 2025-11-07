<?php

include(__DIR__ . "/../../controller/SistemaController.php");

$sistemasCont = new SistemaController();
$sistemas = $sistemasCont -> listar();
//print_r($sistemas);


include_once(__DIR__. "/../include/header.php");

?>

<h3>Listagem dos Sistemas Operacionais</h3>

<div>
     <a href="inserir.php">Adicionar nova Distro</a>
</div>

<table>
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Desenvolvedora</th>
        <th>Versão mais recente</th>
        <th>Padrão lançamento</th>
        <th>Pacotes Padrões</th>
        <th>Derivação do Sistema</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <!--Dados-->
<?php foreach($sistemas as $s): ?>
    <tr>
        <td><?= $s->getId() ?></td>
        <td><?= $s->getNome() ?></td>
        <td><?= $s->getDesenvolvedora() ?></td>
        <td><?= $s->getVersao() ?></td>
        <td><?= $s->getPadraoLancamento()?->getPadraoLancamento() ?></td>
        <td><?= $s->getPacotesPadrao()?->getPacotesPadrao() ?></td>
        <td><?= $s->getDerivado()?->getDerivado() ?></td>
        <td><a onclick="return confirm('Confirma a edição?')" href="editar.php?id=<?= $s->getId() ?>">Editar</a></td>
        <td><a onclick="return confirm('Confirma a exclusão?')" href="excluir.php?id=<?= $s->getId() ?>">Excluir</a></td>
    </tr>
<?php endforeach; ?>

</table>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>