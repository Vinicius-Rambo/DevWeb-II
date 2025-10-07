<?php
function mediaA($n1,$n2,$n3){
    return ($n1 + $n2 + $n3) / 3;
}
echo "Media Aritimetica de 3 valores com POST = ";
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$num3 = $_POST["num3"];

echo mediaA($num1, $num2, $num3);

?>