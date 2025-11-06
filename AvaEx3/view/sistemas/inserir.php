<?php
include_once(__DIR__ . "/../../model/Sistema.php");
include_once(__DIR__ . "/../../controller/SistemaController.php");

// Verificar se o usuário clicou em "Adicionar"
if (isset($_POST['nome'])) {

    $nome           = trim($_POST['nome']) ?: NULL;
    $desenvolvedora = trim($_POST['desenvolvedora']) ?: NULL;
    $versao         = trim($_POST['versao']) ?: NULL;
    $idPadrao       = is_numeric($_POST['padraoLancamento']) ? $_POST['padraoLancamento'] : NULL;
    $idPacote       = is_numeric($_POST['padraoPacotes']) ? $_POST['padraoPacotes'] : NULL;
    $idDerivado     = is_numeric($_POST['derivados']) ? $_POST['derivados'] : NULL;

    // Cria objeto Sistema
    $sistema = new Sistema();
    $sistema->setNome($nome);
    $sistema->setDesenvolvedora($desenvolvedora);
    $sistema->setVersao($versao);
    $sistema->setPadraoLancamento($idPadrao);
    $sistema->setPacotesPadrao($idPacote);
    $sistema->setDerivado($idDerivado);

    // Chama o controller
    $sistemaCont = new SistemaController();
    $sistemaCont->inserir($sistema);

    header("location: listar.php");
}

include_once(__DIR__ . "/form.php");
?>
