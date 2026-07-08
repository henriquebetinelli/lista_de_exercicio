<?php
function formatarTexto($texto) {
    $textoMaiuscula = converterMaiuscula($texto);
    $textoMinuscula = converterMinuscula($texto);
    $textoPrimeiraMaiuscula = converterPrimeiraMaiuscula($texto);
    $quantidadeCaracteres = contarCaracteres($texto);
    
    return [
        'maiuscula' => $textoMaiuscula,
        'minuscula' => $textoMinuscula,
        'primeiraMaiuscula' => $textoPrimeiraMaiuscula,
        'quantidadeCaracteres' => $quantidadeCaracteres
    ];
}

function converterMaiuscula($texto) {
    return strtoupper($texto);
}

function converterMinuscula($texto) {
    return strtolower($texto);
}

function converterPrimeiraMaiuscula($texto) {
    return ucwords($texto);
}

function contarCaracteres($texto) {
    return strlen($texto);
}

$textoEntrada = "padronizar relatórios automaticamente";
$resultado = formatarTexto($textoEntrada);

echo "<b>Texto original:</b> " . $textoEntrada . "<br> <br>";
echo "<b>Texto em maiúsculas:</b> " . $resultado['maiuscula'] . "<br>";
echo "<b>Texto em minúsculas:</b> " . $resultado['minuscula'] . "<br>";
echo "<b>Texto com Primeira Letra Maiúscula:</b> " . $resultado['primeiraMaiuscula'] . "<br>";
echo "<b>Quantidade de caracteres:</b> " . $resultado['quantidadeCaracteres'];