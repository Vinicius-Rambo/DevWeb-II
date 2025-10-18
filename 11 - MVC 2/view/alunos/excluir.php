<?php
include_once(__DIR__ . "/../../controller/AlunoController.php");
$alunoCont = new AlunoController;

$id = 0;
if(isset($_GET['id'])){
    $idEx = $_GET["id"];
}

$alunoCont->deletar($idEx);

header("location: listar.php");










?>