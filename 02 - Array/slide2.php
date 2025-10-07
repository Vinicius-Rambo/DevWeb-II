<?php

$pessoa1 = array(
        "nome" => "Manuel de Medeiros",
        "rua" => "Rua das Acácias",
        "cidade" => "Foz do Iguaçu",
        "uf" => "PR",
);

$pessoa2 = array(
        "nome" => "Juliana de Amaral",
        "rua" => "Rua dos Pinheiros",
        "cidade" => "Florianópolis",
        "uf" => "SC",
);

$pessoa3 = array(
        "nome" => "Rodrigo Baidek",
        "rua" => "Rua Dom Pedro I",
        "cidade" => "Petrópolis",
        "uf" => "SC",
);

$pessoa4 = array(
        "nome" => "Fabíola da silva",
        "rua" => "Rua Chile",
        "cidade" => "Guarulhos",
        "uf" => "SP",
);


$pessoas = array($pessoa1, $pessoa2, $pessoa3, $pessoa4);

echo "<table><br>";
echo "<tr><br>";
echo "<td>Nome</td>";
echo "<td>Endereço</td>";
echo "<td>Cidade</td>";
echo "<td>UF</td>";
echo "</tr>";

foreach($pessoas as $pessoa){

echo "<tr><br>";
echo "<td>" . $pessoa["nome"] . "</td>";
echo "<td>" . $pessoa["rua"] . "</td>";
echo "<td>" . $pessoa["cidade"] . "</td>";
echo "<td>" . $pessoa["uf"] . "</td>";
echo "</tr><br>";
}

