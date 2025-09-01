<?php
    include_once("persistencia.php");

    $dados = buscarDados("dados.json"); //Busca cadastro já salvos

    //inicializadores de variaveis em nulo.
    $msgErro = "";
    $nome = "";
    $idade = "";
    $genero = "";
    $ne = "";
    $email = "";

     

    if(isset($_POST['nome'])){
        //Já cliclou no enviar.
        $nome = trim($_POST["nome"]);
        $idade = trim($_POST["idade"]);
        $genero = trim($_POST["genero"]);
        $ne = $_POST["ne"];
        $email = trim($_POST["email"]);
        
        $erros = array();  //array para os erros.

        if ($nome == ''){ array_push ($erros, "informe o nome!"); }
        if ($idade == ''){ array_push ($erros, "informe a idade!"); }
        if ($genero == ''){ array_push ($erros, "informe o gênero!"); }
        if ($ne == ''){ array_push ($erros, "informe se houver necessidades especiais!"); }
        if ($email == ''){ array_push ($erros, "informe o e-mail!"); }

        if(empty($erros)){ //se tudo der certo
            $dado = array(
                "id" => uniqid(),
                "nome" => $nome,
                "idade" => $idade,
                "genero" => $genero,
                "ne" => $ne,
                "email" => $email
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuarios</title>
</head>

<body>
    <h1> Cadastro de Usuarios </h1>
    <h3> biblioteca de Logins </h3>

    <form method="POST">
        <label>Nome</label>
        <input type="text" name="nome" id="nome" value="<?=$nome ?> "><br>
        
        <label>Idade</label>
        <input type="number" name="idade" id="idade" value="<?=$idade?>"><br>

        <label>Gênero: </label>

        <select name="genero">
        <option value=""> - - - Selecione - - - </option>
        <option value="M" <?= $genero == 'M' ? 'selected' : '' ?>> Homem </option>
        <option value="F" <?= $genero == 'F' ? 'selected' : ''?>> Mulher </option>
        <option value="PN"<?= $genero == 'PN' ? 'selected' : ''?>>  Prefiro não informar </option>

        </select><br>

        <label> Necessidades especiais? </label><br> <!-- Sei que não se era necessario o input Radio, mas eu quis testar como funciona -->

        <label>Sim</label>
        <input type="radio" name="ne" value="sim" <?= $ne == 'sim' ? 'checked' : '' ?>>
        
        <label>Não</label>
        <input type="radio" name="ne" value="nao" <?= $ne == 'nao' ? 'checked' : '' ?>><br>
        
        <label> E-mail de contato </label>
        <input type="text" name="email" id="email" value="<?= $email ?> "> <!-- normalmente usaria Type="email" -->
        

        <input type="submit" value="Enviar">
    </form>

    <div id="divErro" style="color: red;"> <?= $msgErro ?> </div>  
    <h3> pessoas cadastradas </h3>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Gênero</th>
            <th>Necessidades Especiais</th>
            <th>Email</th>
            <th>Excluir</th>
        </tr>
        <?php foreach($dados as $u): ?>
            <tr>
                <td> <?= $u['id'] ?></td>
                <td> <?= $u['nome'] ?></td>
                <td> <?= $u['idade'] ?></td>
                <td>
                    <?php
                        if ($u['genero'] == 'M') echo 'Masculino';
                        elseif ($u['genero'] == 'F') echo 'Feminino';
                        elseif ($u['genero'] == 'PN') echo 'Prefiro não informar';
                    ?>    
                </td>
                <td> <?= $u['ne'] == 'sim' ? 'Sim' : 'Não' ?> </td>
                <td> <?= $u['email'] ?></td>   
                <td> <a href="excluir.php?id=<?= $u['id'] ?>" 
                   onclick="return confirm('Confirma a exclusão deste usuário?')">Excluir</a>
                </td>   
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>




