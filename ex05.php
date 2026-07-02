<?php

function analisarTexto($texto) {
    return [
        'quantidadePalavras' => calcularQuantidadePalavras($texto),
        'quantidadeCaracteres' => calcularQuantidadeCaracteres($texto),
        'quantidadeVogais' => calcularQuantidadeVogais($texto),
        'quantidadeConsoantes' => calcularQuantidadeConsoantes($texto)
    ];
}

function calcularQuantidadePalavras($texto) {
    $palavras = str_word_count($texto);
    return $palavras;
}

function calcularQuantidadeCaracteres($texto) {
    $caracteres = strlen($texto);
    return $caracteres;
}

function calcularQuantidadeVogais($texto) {
    $vogais = preg_match_all('/[aeiouAEIOU]/', $texto);
    return $vogais;
}

function calcularQuantidadeConsoantes($texto) {
    $consoantes = preg_match_all('/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/', $texto);
    return $consoantes;
}

$texto = "Sou muito legal";
$resultado = analisarTexto($texto);

echo "Texto original: " . $texto . "<br>";
echo "Quantidade de palavras: " . $resultado['quantidadePalavras'] . "<br>";
echo "Quantidade de caracteres: " . $resultado['quantidadeCaracteres'] . "<br>";
echo "Quantidade de vogais: " . $resultado['quantidadeVogais'] . "<br>";
echo "Quantidade de consoantes: " . $resultado['quantidadeConsoantes'] . "<br>";
