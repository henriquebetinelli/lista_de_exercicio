<?php
function estatisticasNumericas($numeros) {
    $somaDosNumeros = calcularSoma($numeros);
    $mediaDosNumeros = calcularMedia($numeros);
    $maiorValor = verificarMaiorValor($numeros);
    $menorValor = verificarMenorValor($numeros);
    $mediana = calcularMediana($numeros);
    $QuantidadeDeNumerosPares = calcularQuantidadeDeNumerosPares($numeros);
    $QuantidadeDeNumerosimpares = calcularQuantidadeDeNumerosimpares($numeros);
    
    return [
        'soma' => $somaDosNumeros,
        'media' => $mediaDosNumeros,
        'maiorValor' => $maiorValor,
        'menorValor' => $menorValor,
        'mediana' => $mediana,
        'QuantidadeDeNumerosPares' => $QuantidadeDeNumerosPares,
        'QuantidadeDeNumerosimpares' => $QuantidadeDeNumerosimpares
    ];
}

function calcularSoma($numeros) {
    $soma = 0;
    foreach ($numeros as $numero) {
        $soma += $numero;
    }
    return $soma;
}

function calcularMedia($numeros) {
    $soma = calcularSoma($numeros);
    return $soma / count($numeros);
}

function verificarMaiorValor($numeros) {
    $maior = null;
    foreach ($numeros as $numero) {
        if ($maior === null || $numero > $maior) {
            $maior = $numero;
        }
    }
    return $maior;
}

function verificarMenorValor($numeros) {
    $menor = null;
    foreach ($numeros as $numero) {
        if ($menor === null || $numero < $menor) {
            $menor = $numero;
        }
    }
    return $menor;
}

function calcularMediana($numeros) {
    sort($numeros);
    $count = count($numeros);
    $middle = floor($count / 2);
    
    if ($count % 2 === 0) {
        return ($numeros[$middle - 1] + $numeros[$middle]) / 2;
    } else {
        return $numeros[$middle];
    }
}

function calcularQuantidadeDeNumerosPares($numeros) {
    $quantidadePares = 0;
    foreach ($numeros as $numero) {
        if ($numero % 2 === 0) {
            $quantidadePares++;
        }
    }
    return $quantidadePares;
}

function calcularQuantidadeDeNumerosimpares($numeros) {
    $quantidadeImpares = 0;
    foreach ($numeros as $numero) {
        if ($numero % 2 !== 0) {
            $quantidadeImpares++;
        }
    }
    return $quantidadeImpares;
}

$numeros = [5, 10, 15, 20, 25, 30, 35, 40, 45, 50];
$estatisticas = estatisticasNumericas($numeros);

echo "Números: " . implode(", ", $numeros) . "<br> <br>";
echo "Soma dos números: " . $estatisticas['soma'] . "<br>";
echo "Média dos números: " . $estatisticas['media'] . "<br>";
echo "Maior valor: " . $estatisticas['maiorValor'] . "<br>";
echo "Menor valor: " . $estatisticas['menorValor'] . "<br>";
echo "Mediana: " . $estatisticas['mediana'] . "<br>";
echo "Quantidade de números pares: " . $estatisticas['QuantidadeDeNumerosPares'] . "<br>";
echo "Quantidade de números ímpares: " . $estatisticas['QuantidadeDeNumerosimpares'] . "<br>";