<?php
function calcularMedia($notas) {
    $maiorNota = verificarMaiorNota($notas);
    $menorNota = verificarMenorNota($notas);
    $media = verificarMedia($notas);
    $situacaoFinal = verificarSituacaoFinal($media);
    
    return [
        'maiorNota' => $maiorNota,
        'menorNota' => $menorNota,
        'media' => $media,
        'situacaoFinal' => $situacaoFinal 
    ];
}

function verificarMaiorNota($notas) {
    return max($notas);
}

function verificarMenorNota($notas) {
    return min($notas);
}

function verificarMedia($notas) {
    $soma = array_sum($notas);
    $quantidadeNotas = count($notas);
    return $soma / $quantidadeNotas;
}

function verificarSituacaoFinal($media) {
    return ($media >= 7) ? 'Aprovado' : 'Reprovado';
}

$notas = [8, 6, 9, 7, 5];
$resultado = calcularMedia($notas);

echo "Notas: " . implode(", ", $notas) . "<br>";
echo "Maior nota: " . $resultado['maiorNota'] . "<br>";
echo "Menor nota: " . $resultado['menorNota'] . "<br>";
echo "Média: " . number_format($resultado['media'], 2) . "<br>";
echo "Situação final: " . $resultado['situacaoFinal'];