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

<div class="row">
    <div class="col-6">
        <form method="POST" action="">

            <!-- Nome -->
            <div class="mb-3">
                <label for="txtNome" class="form-label">Nome:</label>
                <input type="text" id="txtNome" name="nome"
                       class="form-control bg-secondary-subtle"
                       placeholder="Informe o nome"
                       value="<?= $sistema ? $sistema->getNome() : '' ?>">
            </div>

            <!-- Desenvolvedora -->
            <div class="mb-3">
                <label for="txtDesenvolvedora" class="form-label">Densenvolvimento:</label>
                <input type="text" id="txtDesenvolvedora" name="desenvolvedora"
                       class="form-control bg-secondary-subtle"
                       placeholder="Informe a equipe de densenvolvimento"
                       value="<?= $sistema ? $sistema->getDesenvolvedora() : '' ?>">
            </div>

            <!-- Versão -->
            <div class="mb-3">
                <label for="txtVersao" class="form-label">Versão mais recente:</label>
                <input type="text" id="txtVersao" name="versao"
                       class="form-control bg-secondary-subtle"
                       placeholder="Informe a versão"
                       value="<?= $sistema ? $sistema->getVersao() : '' ?>">
            </div>

            <!-- Padrão de Lançamento -->
            <div class="mb-3">
                <label for="selPadrao" class="form-label">Padrão de lançamento:</label>
                <select name="padraoLancamento" id="selPadrao" class="form-select bg-secondary-subtle">
                    <option value="">----Selecione----</option>
                    <?php foreach ($padroes as $p): ?>
                        <option value="<?= $p->getId(); ?>"
                            <?= ($sistema && $sistema->getPadraoLancamento()
                                && $sistema->getPadraoLancamento()->getId() == $p->getId())
                                ? 'selected' : '' ?>>
                            <?= $p->getPadraoLancamento() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pacotes -->
            <div class="mb-3">
                <label for="selPacotes" class="form-label">Pacotes padrão:</label>
                <select name="padraoPacotes" id="selPacotes" class="form-select bg-secondary-subtle">
                    <option value="">----Selecione----</option>
                    <?php foreach ($pacotes as $pp): ?>
                        <option value="<?= $pp->getId(); ?>"
                            <?= ($sistema && $sistema->getPacotesPadrao()
                                && $sistema->getPacotesPadrao()->getId() == $pp->getId())
                                ? 'selected' : '' ?>>
                            <?= $pp->getPacotesPadrao() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Derivação -->
            <div class="mb-3">
                <label for="selDerivados" class="form-label">Derivação do sistema:</label>
                <select name="derivados" id="selDerivados" class="form-select bg-secondary-subtle">
                    <option value="">----Selecione----</option>
                    <?php foreach ($derivados as $d): ?>
                        <option value="<?= $d->getId(); ?>"
                            <?= ($sistema && $sistema->getDerivado()
                                && $sistema->getDerivado()->getId() == $d->getId())
                                ? 'selected' : '' ?>>
                            <?= $d->getDerivado() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Hidden ID -->
            <input name="id" type="hidden" value="<?= $sistema ? $sistema->getId() : 0 ?>">

            <!-- Botão -->
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Adicionar</button>
            </div>

        </form>
    </div>

    <div class="col-6">
        <?php if ($msgErro): ?>
            <div class="alert alert-danger mt-3">
                <?= $msgErro ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div>
    <a href="listar.php" class="btn btn-outline-danger mt-4">Voltar</a>
</div>

<?php include_once(__DIR__ . "/../include/footer.php"); ?>
