<?php
function exibir($valido){
    if($valido == True){
        echo '
        <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Desafio</title>
            </head>
            <body>
             <form action="" method="Post">
                <input name="login" type="text" placeholder="Login">
                <br><br>
                <input name="senha" type="password" placeholder="Senha">
                <br><br>
                <button type="submit"> Enviar </button>
             </form>    
            </body>
            </html>';
    }
}

$login = $_POST["login"];
$senha = $_POST["senha"];
$valido = True;

if($login == "ifpr" && $senha == "tads"){
    $valido = False;
    echo "<h1> Bem-vindo ao TADS!! <h1> <br><br>";
    echo "<a href='desafio.php'>Retornar</a>";
}

exibir($valido);

?>