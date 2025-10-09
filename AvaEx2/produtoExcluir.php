<?php
include_once("connection.php"); //Conexão com MySQL

$id = 0; //Cria uma variavel ID
if(isset($_GET['id'])){
    $id = $_GET['id']; //Caso tenha um id no get a variavel vira ele
}

if($id <= 0){ //Validação do ID para não ser 0 ou negativo
    echo "ID invalido"; 
    exit;
}

$conn = Connection::getConnection();
$sql = "DELETE FROM produtos WHERE id = ?"; //Deleta a linha do ID, 
$stm = $conn->prepare($sql);
$stm->execute([$id]); //Proteção contra SQL injection.

header("location: index.php");
