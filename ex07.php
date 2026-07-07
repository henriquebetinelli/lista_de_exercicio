<?php

function calcularDesconto($valorTotal) {
    $percentualDesconto = calcularPercentualDesconto($valorTotal);

    $descontoAplicado = $valorTotal * $percentualDesconto;
    $valorFinal = $valorTotal - $descontoAplicado;

    return [
        'valorOriginal' => $valorTotal,
        'descontoAplicado' => $descontoAplicado,
        'valorFinal' => $valorFinal
    ];
}

function calcularPercentualDesconto($valorTotal) {
    if ($valorTotal <= 100) return 0;
    if ($valorTotal <= 500) return 0.10;
    if ($valorTotal <= 1000) return 0.20;
    return 0.30;
}

$resultado = calcularDesconto(1200);

echo "Valor original: R$ " . number_format($resultado['valorOriginal'], 2, ',', '.')  . "<br>";
echo "Desconto aplicado: R$ " . number_format($resultado['descontoAplicado'], 2, ',', '.')  . "<br>";
echo "Valor final: R$ " . number_format($resultado['valorFinal'], 2, ',', '.');

