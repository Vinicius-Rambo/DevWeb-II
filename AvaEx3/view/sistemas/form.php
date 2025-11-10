<?php

include_once(__DIR__ . "/../include/header.php");
include_once(__DIR__ . "/../../controller/DerivadoController.php");
include_once(__DIR__ . "/../../controller/PacotesPadraoController.php");
include_once(__DIR__ . "/../../controller/PadraoLancamentoController.php");

$padraoLancCont = new PadraoLancamentoController();
$padroes = $padraoLancCont->listar();

$pacoteCont = new PacotesPadraoController();
$pacotes = $pacoteCont->listar();

$derivadoCont = new DerivadoController();
$derivados = $derivadoCont->listar();

?>
<h3><?= $sistema && $sistema->getId() > 0 ? 'Editar' : 'Inserir' ?> Sistema</h3>

<form method="POST" action="">

    <!--Type Text-->
    <div>
        <label for="txtNome">Nome:</label>
        <input type="text" id="txtNome" name="nome" placeholder="informe o nome" value=" <?= $sistema ? $sistema->getNome() : '' ?>">
    </div>

    <div>
        <label for="txtDesenvolvedora">Desenvolvedora: </label>
        <input type="text" id="txtDesenvolvedora" name="desenvolvedora" placeholder="informe a desenvolvedora" value=" <?= $sistema ? $sistema->getDesenvolvedora() : '' ?>">
    </div>

    <div>
        <label for="txtVersao">Versão mais recente: </label>
        <input type="text" id="txtVersao" name="versao" placeholder="informe a versão mais recente" value=" <?= $sistema ? $sistema->getVersao() : '' ?>">
    </div>

    <!--Type Select-->
    <div>
        <label for="selPadrao">Padrão de lançamento: </label>
        <select name="padraoLancamento" id="selPadrao">
            <option value="">----Selecione----</option>
            <?php foreach ($padroes as $p): ?>
                <option value="<?= $p->getId(); ?>"
                    <?php
                    if (
                        $sistema && $sistema->getPadraoLancamento()
                        && $sistema->getPadraoLancamento()->getId() == $p->getId()
                    )
                        echo "selected";
                    ?>>
                    <?= $p->getPadraoLancamento() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="selPacotes">Gerenciador de pacotes padrão do Sistema: </label>
        <select name="padraoPacotes" id="selPacotes">
            <option value="">----Selecione----</option>
            <?php foreach ($pacotes as $pp): ?>
                <option value="<?= $pp->getId(); ?>"
                    <?php
                    if (
                        $sistema && $sistema->getPacotesPadrao()
                        && $sistema->getPacotesPadrao()->getId() == $pp->getId()
                    )
                        echo "selected";
                    ?>>
                    <?= $pp->getPacotesPadrao() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="selDerivados">Derivação do sistema: </label>
        <select name="derivados" id="selDerivados">
            <option value="">----Selecione----</option>
            <?php foreach ($derivados as $d): ?>
                <option value="<?= $d->getId(); ?>"
                    <?php
                    if (
                        $sistema && $sistema->getDerivado()
                        && $sistema->getDerivado()->getId() == $d->getId()
                    )
                        echo "selected";
                    ?>>
                    <?= $d->getDerivado() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <input name="id" type="hidden" value="<?= $sistema ? $sistema->getId() : 0 ?>">

    <div class="mt-2">
        <button type="submit"
            class="btn btn-success">Adicionar</button>
    </div>
</form>
<div style="color:red;">
    <?= $msgErro ?>
</div>


<div>
    <a href="listar.php">Ir para a listagem: </a>
</div>

<?php

include_once(__DIR__ . "/../include/footer.php"); //Caminho absoluto
?>