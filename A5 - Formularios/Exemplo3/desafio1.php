<?php

if(isset($_POST["login"])){
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if($login == "ifpr" && $senha =="tads"){
        echo "<h1> Bem vindo ao Tads! </h1>";
        $estaLogado = true;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio</title>
</head>
<body>

    <?php if(! $estaLogado):  ?>
    <form action="" method="Post">
        <input name="login" type="text" placeholder="Login">
        <br><br>
        <input name="senha" type="password" placeholder="Senha">
        <br><br>
        <button type="submit"> Enviar </button>
    </form>
    <?php endif; ?>
</body>
</html>