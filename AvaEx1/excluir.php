<?php 
include_once("persistencia.php"); //Inclui percistencia
$dados = buscarDados("dados.json"); //Função para buscar Dados

$id = $_GET['id']; //Variavel local ID = a superGlobal ID 

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