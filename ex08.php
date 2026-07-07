<?php

function ordenarNomes($nomes) {
    sort($nomes);
    return $nomes;
}

$nomes = ["Carlos", "Ana", "Beatriz"];
$nomesOrdenados = ordenarNomes($nomes);

echo "Nomes originais: " . implode(", ", $nomes) . "<br>";
echo "Nomes ordenados: " . implode(", ", $nomesOrdenados);