<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once("persistencia.php"); // Importa um arquivo externo.


$livros = buscarDados("livros.json"); //carrega os dados do JSON
$id = $_GET["id"];  //Recebe o ID do livro 

//Buscar itens por ID
$idxExcluir = -1;
foreach($livros as $idx => $l){ //atribui indice com valor.
    if($id == $l['id']){ //se id selecionado for igual ao id do $l 
        $idxExcluir = $idx;
        break;
    }
}

array_splice($livros, $idxExcluir, 1); //remove o idice encontrado do array

salvarDados($livros, "livros.json"); //Salva os dados ao Json novamente.

header("location: livros.php"); // volta para a lista.



?>