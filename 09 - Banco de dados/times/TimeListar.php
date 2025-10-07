<?php
    include_once("Connection.php");

    $conn = Connection::getConnection(); //Obtendo a conexão, a classe é estatica.

    $sql = "SELECT * FROM times";  //Um select em times
    $stm = $conn -> prepare($sql); //Prepara a instrução SQL
    $stm->execute(); //Executa o mesmo

    $dados = $stm -> fetchAll(); //Pega o retorno
    //print_r($dados); apenas para teste 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times</title>
</head>
<body>
    <h1>Aula banco de dados - Times</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Excluir</th>
        </tr>
        <?php foreach($dados as $t): ?>
            <tr>
                <td> <?= $t['id']?></td>
                <td> <?= $t['nome']?></td>
                <td> <?= $t['cidade']?></td>
                <td><a onclick="return confirm('Confirmar em Excluir?');" href="timeExcluir.php?id=<?= $t['id']?>">excluir</a></td>
            </tr>
        <?php endforeach; ?>     
        
    </table>
</body>
</html>