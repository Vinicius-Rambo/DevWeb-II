<?php

include(__DIR__ . "/../../controller/SistemaController.php");

$sistemasCont = new SistemaController();
$sistemas = $sistemasCont -> listar();
//print_r($sistemas);


include_once(__DIR__. "/../include/header.php");

?>

<h3>Listagem dos Sistemas Operacionais</h3>

<div class="mb-3">
    <a href="inserir.php" class="btn btn-success">Adicionar nova Distro</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Densenvolvimento</th>
            <th>Versão mais recente</th>
            <th>Padrão lançamento</th>
            <th>Pacotes Padrões</th>
            <th>Derivação do Sistema</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($sistemas as $s): ?>
        <tr>
            <td><?= $s->getId() ?></td>
            <td><?= $s->getNome() ?></td>
            <td><?= $s->getDesenvolvedora() ?></td>
            <td><?= $s->getVersao() ?></td>
            <td><?= $s->getPadraoLancamento()?->getPadraoLancamento() ?></td>
            <td><?= $s->getPacotesPadrao()?->getPacotesPadrao() ?></td>
            <td><?= $s->getDerivado()?->getDerivado() ?></td>
            <td>
                <a onclick="return confirm('Confirma a edição?')" href="editar.php?id=<?= $s->getId() ?>" class="btn btn-success btn-sm">Editar</a>
            </td>
            <td>
                <a onclick="return confirm('Confirma a exclusão?')" href="excluir.php?id=<?= $s->getId() ?>" class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php
include_once(__DIR__ . "/../include/footer.php");
?>
