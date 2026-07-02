<?php

function calcularFormula($x, $y) {
    if (($x + $y) == 0) {
        return "Não é possivel realizar a divisão por zero";
    }

    $resultado = (pow($x, 2) + pow($y, 2)) / ($x + $y);
    return $resultado;
}

$x = 10;
$y = 5;

echo "O valor de x é: " . $x . "<br>";
echo "O valor de y é: " . $y . "<br> <br>";
echo "O resultado : " . calcularFormula($x, $y);
