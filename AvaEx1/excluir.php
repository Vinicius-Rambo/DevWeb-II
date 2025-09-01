<?php 
include_once("persistencia.php");
$dados = buscarDados("dados.json");

$id = $_GET['id'];

$idExcluir = -1;
foreach($dados as $idx =>$l){
    if($id == $l['id']){
        $idExcluir = $idx;
        break;
    }
}
array_splice($dados, $idExcluir, 1);
salvarDados($dados, "dados.json");

header("location: index.php");

?>