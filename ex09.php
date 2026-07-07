<?php

function analisarNumero($numero) {
    $ePar = verificadorDePares($numero);
    $ePrimo = verificadorDePrimos($numero);
    $ePerfeito = verificadorDePerfeitos($numero);

    return [
        'ePar' => $ePar,
        'ePrimo' => $ePrimo,
        'ePerfeito' => $ePerfeito,
    ];
}

function verificadorDePares($numero) {
    if ($numero % 2 === 0) return "É par";
    return "É ímpar";
}

function verificadorDePrimos($numero) {
    if ($numero < 2) return "Não é primo";

    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i === 0) return "Não é primo";
    }

    return "É primo";
}

function verificadorDePerfeitos($numero) {
    $somaDivisores = 0;

    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i === 0) {
            $somaDivisores += $i;
        }
    }

    if ($somaDivisores === $numero) return "É perfeito";
    return "Não é perfeito";
}

$numero = 28;
$resultado = analisarNumero($numero);   

echo "Número analisado: " . $numero . "<br>";
echo "Verificação de paridade: " . $resultado['ePar'] . "<br>";
echo "Verificação de primalidade: " . $resultado['ePrimo'] . "<br>";
echo "Verificação de perfeição: " . $resultado['ePerfeito'];