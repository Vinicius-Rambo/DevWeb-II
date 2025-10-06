<?php
include_once("connection.php");

$erro = ""; //Inicialização vazia
$descricao = "";
$un_medida = "";

if(isset($_GET['descricao']) && isset($_GET['un_medida'])){
    $descricao = trim($_GET['descricao']);
    $un_medida = trim($_GET['un_medida']);

    if($descricao !="" && $un_medida != ""){ //Se ambos não forem vazios. 
        $conn = Connection::getConnection();
        $sql = "INSERT INTO produtos (descricao, un_medida) VALUES(?,?)";
        $stm = $conn->prepare($sql);
        $stm ->execute(array($descricao, $un_medida)); //Aprova de SQL injection

        header("Location: index.php");
        exit;
    }else{
        $erro = "Preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção</title>
</head>
<body>
    <h1> Inserir Produtos </h1>
    <form method= "GET">
        <input type="text" name="descricao" placeholder="Descrição">
        <input type="text" name="un_medida" placeholder="Unidade">
        <input type="submit" value="Salvar!">
        <div id="divErro" style="color: #f7768e;"> <?= $erro ?> </div>

    </form>
</body>
</html>