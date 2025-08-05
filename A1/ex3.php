<?php
echo "Todos os anos bissextos de 1980 até 2024:<br>";

for ($i = 1980; $i <= 2024; $i++) {
    if (($i % 4 == 0 && $i % 100 != 0) || ($i % 400 == 0)) {
        echo $i . "<br>";
    }
}
?>
