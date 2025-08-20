<?php
//veiculo_exec.php
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$combust = $_POST["combustivel"];

if ($combust == 'A') {
    $combust = "Alcool";

} elseif ($combust == 'G') {
    $combust = "Gasolina";

} else {
    $combust = "Flex";
}

echo "<h1>Dados informados para o veículo</h1>";
echo "Modelo: " . $modelo . "<br>";
echo "Marca: " . $marca . "<br>";
echo "Combustível: " . $combust . "<br>";
echo "<br><br>";
echo "<a href='veiculo.php'>Cadastrar outro veículo</a>";
