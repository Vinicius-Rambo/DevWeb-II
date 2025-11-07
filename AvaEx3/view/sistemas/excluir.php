<?php
include_once(__DIR__."/../../controller/SistemaController.php");
$sistemaCont = new SistemaController;

$id = 0;
if(isset($_GET['id'])){
    $idEx = $_GET["id"];
}

$sistemaCont->deletar($idEx);
header("location: listar.php");

?>