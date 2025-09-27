<?php
include_once("persistencia.php");

$dados = buscarDados("dados.json"); //Busca cadastro já salvos

//inicializadores de variaveis em nulo.
$msgErro = "";
$nome = "";
$tipo = "";
$gravidade = "";
$via_lactea = "";
$distancia = "";

if (isset($_POST['nome'])) {
    //Já cliclou no enviar.
    $nome = trim($_POST["nome"]);
    $tipo = trim($_POST["tipo"]);
    $gravidade = trim($_POST["gravidade"]);
    $via_lactea = $_POST["via_lactea"];
    $distancia = trim($_POST["distancia"]);

    $erros = array();  //array para os erros.

    if ($nome == '') {
        array_push($erros, "informe o nome!");
    }
    if ($tipo == '') {
        array_push($erros, "informe o tipo!");
    }
    if ($gravidade == '') {
        array_push($erros, "informe a gravidade!");
    }
    if ($via_lactea == '') {
        array_push($erros, "informe se está na Via Láctea!");
    }
    if ($distancia == '') {
        array_push($erros, "informe a distância!");
    }

    if (empty($erros)) { //se tudo der certo
        $dado = array(
            "id" => uniqid(),
            "nome" => $nome,
            "tipo" => $tipo,
            "gravidade" => $gravidade,
            "via_lactea" => $via_lactea,
            "distancia" => $distancia
        );

        array_push($dados, $dado);
        salvarDados($dados, "dados.json");

        header("location: index.php");
    } else {
        $msgErro = implode("<br>", $erros);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Astros</title>
    <link rel="stylesheet" href="cosmic.css">
</head>

<body>
    <h1> Cadastro de Astros </h1>
    <h3> Biblioteca de corpos celestes </h3>

    <div class="container">
        <form method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome" value="<?= $nome ?> "><br><br>

            <select name="tipo">
                <option value=""> - - - Selecione o Tipo - - - </option>
                <option value="Planeta" <?= $tipo == 'Planeta' ? 'selected' : '' ?>> Planeta </option>
                <option value="Estrela" <?= $tipo == 'Estrela' ? 'selected' : '' ?>> Estrela </option>
                <option value="Nebulosa" <?= $tipo == 'Nebulosa' ? 'selected' : '' ?>> Nebulosa </option>
                <option value="Cometa" <?= $tipo == 'Cometa' ? 'selected' : '' ?>> Cometa </option>
                <option value="Buraco Negro" <?= $tipo == 'Buraco Negro' ? 'selected' : '' ?>> Buraco Negro </option>
                <option value="Galáxia" <?= $tipo == 'Galáxia' ? 'selected' : '' ?>> Galáxia </option>
                <option value="Satélite Natural" <?= $tipo == 'Satélite Natural' ? 'selected' : '' ?>> Satélite Natural </option>
                <option value="Aglomerado Estelar" <?= $tipo == 'Aglomerado Estelar' ? 'selected' : '' ?>> Aglomerado Estelar </option>
            </select><br><br>

            <input type="number" step="0.1" name="gravidade" id="gravidade" placeholder="Gravidade (m/s²)" value="<?= $gravidade ?>"><br><br>

            <select name="distancia">
                <option value=""> - - - Selecione a Distância - - - </option>
                <option value="0-1000 anos-luz" <?= $distancia == '0-1000 anos-luz' ? 'selected' : '' ?>> 0–1000 anos-luz </option>
                <option value="1000-10000 anos-luz" <?= $distancia == '1000-10000 anos-luz' ? 'selected' : '' ?>> 1000–10000 anos-luz </option>
                <option value="10000-100000 anos-luz" <?= $distancia == '10000-100000 anos-luz' ? 'selected' : '' ?>> 10000–100000 anos-luz </option>
                <option value="100000-1M anos-luz" <?= $distancia == '100000-1M anos-luz' ? 'selected' : '' ?>> 100000–1M anos-luz </option>
                <option value="1M+ anos-luz" <?= $distancia == '1M+ anos-luz' ? 'selected' : '' ?>> 1M+ anos-luz </option>
            </select>

            <h3>Está na Via Láctea?</h3>

            <label> <input type="radio" name="via_lactea" value="sim" <?= $via_lactea == 'sim' ? 'checked' : '' ?>> Sim </label>
            <label> <input type="radio" name="via_lactea" value="nao" <?= $via_lactea == 'nao' ? 'checked' : '' ?>> Não </label>

            <br><br> <input type="submit" value="Enviar">
        </form>

        <div id="divErro" style="color: #f7768e;"> <?= $msgErro ?> </div>
    </div>
    <h3> Cosmos Descobertos </h3>

    <div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Gravidade</th>
                <th>Está na Via Láctea?</th>
                <th>Distância</th>
                <th>Excluir</th>
            </tr>
            <?php foreach ($dados as $u): ?>
                <tr>
                    <td> <?= $u['id'] ?></td>
                    <td> <?= $u['nome'] ?></td>
                    <td> <?= $u['tipo'] ?></td>
                    <td> <?= $u['gravidade'] ?> m/s²</td>
                    <td> <?= $u['via_lactea'] == 'sim' ? 'Sim' : 'Não' ?> </td>
                    <td> <?= $u['distancia'] ?></td>
                    <td> <a href="excluir.php?id=<?= $u['id'] ?>"
                            onclick="return confirm('Confirma a exclusão deste astro?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
<script> </script>
</html>
