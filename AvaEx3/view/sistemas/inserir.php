<?php
include_once(__DIR__ . "/../../model/Sistema.php");
include_once(__DIR__ . "/../../model/PadraoLancamento.php");
include_once(__DIR__ . "/../../model/PacotesPadrao.php");
include_once(__DIR__ . "/../../model/Derivado.php");
include_once(__DIR__ . "/../../controller/SistemaController.php");

$msgErro = ""; 
$sistema = "";

// Verifica se o usuário clicou em "Adicionar"
if (isset($_POST['nome'])) {

    $nome           = trim($_POST['nome']) ? trim($_POST['nome']): NULL;
    $desenvolvedora = trim($_POST['desenvolvedora']) ? trim($_POST['desenvolvedora']): NULL;
    $versao         = trim($_POST['versao']) ? trim($_POST['versao']) : NULL;
    $idPadrao       = is_numeric($_POST['padraoLancamento']) ? $_POST['padraoLancamento'] : NULL;
    $idPacote       = is_numeric($_POST['padraoPacotes']) ? $_POST['padraoPacotes'] : NULL;
    $idDerivado     = is_numeric($_POST['derivados']) ? $_POST['derivados'] : NULL;

    // Cria objeto Sistema
    $sistema = new Sistema();
    $sistema->setNome($nome);
    $sistema->setDesenvolvedora($desenvolvedora);
    $sistema->setVersao($versao);

    // Define objeto PadraoLancamento
    if ($idPadrao) {
        $padrao = new PadraoLancamento();
        $padrao->setId($idPadrao);
        $sistema->setPadraoLancamento($padrao);
    } else {
        $sistema->setPadraoLancamento(null);
    }

    // Define objeto PacotesPadrao
    if ($idPacote) {
        $pacote = new PacotesPadrao();
        $pacote->setId($idPacote);
        $sistema->setPacotesPadrao($pacote);
    } else {
        $sistema->setPacotesPadrao(null);
    }

    // Define objeto Derivado
    if ($idDerivado) {
        $derivado = new Derivado();
        $derivado->setId($idDerivado);
        $sistema->setDerivado($derivado);
    } else {
        $sistema->setDerivado(null);
    }

    // Chama o controller
    $sistemaCont = new SistemaController();
    $erros = $sistemaCont->inserir($sistema);

    if (! $erros) {
        header("location: listar.php");
    } else {
        $msgErro = implode("<br>", $erros);
    }
}

include_once(__DIR__ . "/form.php");
?>
