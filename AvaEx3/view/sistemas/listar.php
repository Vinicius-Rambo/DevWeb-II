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
        <th><?= $s->getId() ?></th>
        <th><?= $s->getNome() ?></th>
        <th><?= $s->getDesenvolvedora() ?></th>
        <th><?= $s->getVersao() ?></th>
        <th><?= $s->getPadraoLancamento()?->getPadraoLancamento() ?></th>
        <th><?= $s->getPacotesPadrao()?->getPacotesPadrao() ?></th>
        <th><?= $s->getDerivado()?->getDerivado() ?></th>
        <th></th>
        <th></th>
    </tr>
<?php endforeach; ?>

</table>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>