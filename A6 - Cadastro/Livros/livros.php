<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php"); // Importa um arquivo externo.

$livros = buscarDados("livros.json");  //Buscar livros salvos

if (isset($_POST["titulo"])) { //Validação do titulo

    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $numPaginas = $_POST["numPaginas"];
    $autor = $_POST["autor"];


    $livro = array(
        "id" => uniqid(), //Gera um codigo unico função nativa
        "titulo" => $titulo,
        "genero" => $genero,
        "paginas" => $numPaginas,
        "autor" => $autor
    );

    array_push($livros, $livro); //Insere livro dentro do livros 
    salvarDados($livros, "livros.json"); //Insere o Array livros no arquivo JSON, função criada 
    
    header("location: livros.php"); //Envia para uma pagina especifica, nesse caso envia para a mesma para evitar o Buffer.
}

//print_r($livros); // apenas para teste
// "<?=" Short Tag do "PHP + Echo"

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>

<body>

    <h1>Cadastro de livros</h1>

    <h3>Cadastre seu livro aqui</h3>
    <form method="POST">
        <input type="text" name="titulo" placeholder="Informe o título" />
        <br><br>

        <select name="genero">
            <option value="">--Selecione o gênero--</option>
            <option value="D">Drama</option>
            <option value="F">Ficção</option>
            <option value="R">Romance</option>
            <option value="O">Outro</option>
        </select>
        <br><br>

        <input type="number" name="numPaginas" placeholder="Informe o número de páginas">
        <br><br>
        <input type="text" name="autor" placeholder="Informe o autor">

        <input type="submit" value="Enviar" />
    </form>

    <h3>Livros cadastrados</h3>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>Quant. Páginas</th>
            <th>Autor</th>
            <th>Excluir</th>
        </tr>

        <?php foreach($livros as $l): //Percore todo o array livros e adiciona no "$l" ?> 
            <tr>
                <td><?php echo $l['id']?> </td>
                <td><?= $l['titulo']?> </td> 
                <td><?= $l['genero']?> </td>
                <td><?= $l['paginas']?> </td>
                <td><?= $l['autor']?> </td>
                <td>
                    <a href="excluir.php?id=<?= $l['id'] ?>" onclick="return confirm('Confirma a exclusão?')"> Excluir</a> <!--Comando com PHP e javascrip para confirmar a exclusão-->
                </td>

            </tr>
        <?php endforeach; ?>    
 
       </table>

</body>

</html>