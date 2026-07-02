<?php

function calcularTemperatura($temperatura, $unidadeOrigem, $unidadeDestino) {
    if (eDeCelciusParaFahrenheit($unidadeOrigem, $unidadeDestino)) {
        return ($temperatura * 9/5) + 32;
    } 
    
    if (eDeFahrenheitParaCelcius($unidadeOrigem, $unidadeDestino)) {
        return ($temperatura - 32) * 5/9;
    }  

    return $temperatura;
}

function eDeCelciusParaFahrenheit($unidadeOrigem, $unidadeDestino) {
    return $unidadeOrigem === 'C' && $unidadeDestino === 'F';
}

function eDeFahrenheitParaCelcius($unidadeOrigem, $unidadeDestino) {
    return $unidadeOrigem === 'F' && $unidadeDestino === 'C';
}

$temperatura = 25;
$unidadeOrigem = 'C';
$unidadeDestino = 'F';
$resultado = calcularTemperatura($temperatura, $unidadeOrigem, $unidadeDestino);
echo "Temperatura original: " . $temperatura . "°" . $unidadeOrigem . "<br>";
echo "Temperatura convertida: " . $resultado . "°" . $unidadeDestino;
