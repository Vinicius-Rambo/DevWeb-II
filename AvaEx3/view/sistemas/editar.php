<?php
include_once(__DIR__ . "/../../controller/SistemaController.php");

$sistemaCont = new SistemaController();
$sistema = null;
$msgErro = "";

if (isset($_POST['nome'])) { // Já clicou no gravar
    $id         = $_POST["id"];
    $nome       = trim($_POST["nome"]) ?: NULL;
    $dev        = trim($_POST["desenvolvedora"]) ?: NULL;
    $versao     = trim($_POST["versao"]) ?: NULL;
    $idPadrao   = is_numeric($_POST["padraoLancamento"]) ? $_POST["padraoLancamento"] : NULL;
    $idPacotes  = is_numeric($_POST["padraoPacotes"]) ? $_POST["padraoPacotes"] : NULL;
    $idDerivado = is_numeric($_POST["derivados"]) ? $_POST["derivados"] : NULL;

    $sistema = new Sistema();
    $sistema->setId($id);
    $sistema->setNome($nome);
    $sistema->setDesenvolvedora($dev);
    $sistema->setVersao($versao);

    if ($idPadrao) {
        $padrao = new PadraoLancamento();
        $padrao->setId($idPadrao);
        $sistema->setPadraoLancamento($padrao);
    } else {
        $sistema->setPadraoLancamento(NULL);
    }

    if ($idPacotes) {
        $pacote = new PacotesPadrao();
        $pacote->setId($idPacotes);
        $sistema->setPacotesPadrao($pacote);
    } else {
        $sistema->setPacotesPadrao(NULL);
    }

    if ($idDerivado) {
        $derivado = new Derivado();
        $derivado->setId($idDerivado);
        $sistema->setDerivado($derivado);
    } else {
        $sistema->setDerivado(NULL);
    }

    $erros = $sistemaCont->editar($sistema);

    if (!$erros) {
        header("location: listar.php");
        exit;
    } else {
        $msgErro = implode("<br>", $erros);
    }

} else { // Abriu para editar
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "ID inválido ou não informado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }

    $id = $_GET['id'];
    $sistema = $sistemaCont->buscarPorID($id);

    if (!$sistema) {
        echo "Sistema não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");
?>
