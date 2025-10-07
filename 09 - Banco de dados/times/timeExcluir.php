<?php
include_once("Connection.php");
if(!isset($_GET["id"])){
    echo "Erro: ID não encontrado";
    exit;
}

$exId = $_GET["id"];
$conn = Connection::getConnection();

$sql = "DELETE FROM times WHERE id= ?;";
$stm = $conn->prepare($sql);
$stm -> execute(array($exId));

header("location:TimeListar.php"); //Volta para listagem
