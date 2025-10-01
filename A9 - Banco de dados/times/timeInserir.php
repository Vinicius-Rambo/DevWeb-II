<?php
include_once('Connection.php');
//Validação dos parâmetros

if(!isset($_GET['nome']) || !isset($_GET['cidade'])){
    echo "Informe os parametros";
    exit;
}

//Receber o nome e a cidade do time por parâmetro GET
$nome = $_GET['nome'];
$cidade = $_GET['cidade'];

//Inserir o time no banco.
$conn = Connection::getConnection();
$sql = "INSERT INTO times(nome, cidade) 
        Values (?,?)"; //Forma usando parametros para evitar SQL injection 
$stm = $conn -> prepare($sql); //Receita de bolo para preparar
$stm-> execute(array($nome, $cidade)); //Executa com parametros

header("location:TimeListar.php"); //Volta para listagem

?>