<?php
include_once("Livro.php");

$l1 = new Livro("Eu, robô", "Isaac Asimov","Ficção cientifica",320);
$l2 = new Livro("Pequeno Principe", "Antoine de Saint-Exupéry", "Novela", 96);
$l3 = new Livro("Capitães da Areia", "Jorge Amado", "Romance", 280);

$arrayLivros = array($l1, $l2, $l3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px">
        <tr>
            <td bgcolor="green">Titulo</td>
            <td bgcolor="green">Autor</td>
            <td bgcolor="green">Genero</td>
            <td bgcolor="green">Paginas</td>
        </tr>
    <?php foreach ($arrayLivros as $l): ?>
         <tr>
            <td><?= $l->getTitulo() ?></td>
            <td><?= $l->getAutor() ?></td>
            <td><?= $l->getGenero() ?></td>
            <td><?= $l->getQtdPaginas() ?></td>
         </tr>
    <?php endforeach;?> 
    </table>
</body>
</html>