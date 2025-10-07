<?php
function mediaA($n1,$n2,$n3){
    return ($n1 + $n2 + $n3) / 3;
}
echo "Media Aritimetica de 3 valores com Get = ";
$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$num3 = $_GET["num3"];

echo mediaA($num1, $num2, $num3);

?>