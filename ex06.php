<?php

function calcularTemperatura($temperatura, $unidadeOrigem, $unidadeDestino) {
    if ($unidadeOrigem === 'C' && $unidadeDestino === 'F')) {
        return ($temperatura * 9/5) + 32;
    } 
    
    if ($unidadeOrigem === 'F' && $unidadeDestino === 'C') {
        return ($temperatura - 32) * 5/9;
    }  

    return $temperatura;
}

$temperatura = 25;
$unidadeOrigem = 'C';
$unidadeDestino = 'F';
$resultado = calcularTemperatura($temperatura, $unidadeOrigem, $unidadeDestino);
echo "Temperatura original: " . $temperatura . "°" . $unidadeOrigem . "<br>";
echo "Temperatura convertida: " . $resultado . "°" . $unidadeDestino;
