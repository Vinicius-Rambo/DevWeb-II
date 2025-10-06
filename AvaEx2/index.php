<?php 
include_once("connection.php");

$conn = Connection::getConnection(); //Chama o método para a conexão

$sql = "SELECT * FROM produtos"; //Seleciona tudo da tabela
$stm = $conn->prepare($sql); //Prepara a instrução
$stm -> execute(); //Escutar a Instrução

$produtos = $stm -> fetchAll() ?:[];  //Todos os registros encontrados

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <h2>Todos os Produtos</h2>
        <a href="produtoInserir.php"><button>Adicionar Produto</button></a>
        <table border="1px">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Unidade de medida</th>
                <th>Excluir</th>
            </tr> 
            <?php foreach($produtos as $pr): ?>
            <tr>
                <td><?= $pr['id'] ?></td>
                <td><?= $pr['descricao'] ?></td>
                <td><?= $pr['un_medida'] ?></td>
                <td><a href="produtoExcluir.php?id=<?= $pr['id'] ?>" onclick="return confirm('Confirma a exclusão?');"> Excluir </a> </td>
            </tr>
            <?php endforeach;?>
        </table>
</body>
</html>