<?php
function processarTexto($texto) {
    $palavras = extrairPalavras($texto);

    return [
        'quantidadeCaracteres' => contarCaracteres($texto),
        'quantidadePalavras' => contarPalavras($texto),
        'quantidadeFrases' => contarFrases($texto),
        'palavraMaisLonga' => encontrarPalavraMaisLonga($palavras),
        'palavraMaisCurta' => encontrarPalavraMaisCurta($palavras),
        'quantidadePalavrasRepetidas' => contarPalavrasRepetidas($palavras),
        'cincoPalavrasMaisFrequentes' => listarCincoPalavrasMaisFrequentes($palavras),
        'textoSemEspacosDuplicados' => removerEspacosDuplicados($texto),
        'textoFormatado' => formatarTexto($texto)
    ];
}

function removerEspacosDuplicados($texto) {
    return preg_replace('/\s+/', ' ', trim($texto));
}

function extrairPalavras($texto) {
    $textoFormatado = removerEspacosDuplicados($texto);
    $palavras = explode(' ', $textoFormatado);

    return array_values(array_filter($palavras, function ($palavra) {
        return $palavra !== '';
    }));
}

function contarCaracteres($texto) {
    return strlen($texto);
}

function contarPalavras($texto) {
    $palavras = extrairPalavras($texto);

    return count($palavras);
}

function contarFrases($texto) {
    $frases = preg_split('/[.!?]+/', $texto);
    $frasesFiltradas = array_filter($frases, function ($frase) {
        return trim($frase) !== '';
    });

    return count($frasesFiltradas);
}

function encontrarPalavraMaisLonga($palavras) {
    $palavraMaisLonga = '';

    for ($i = 0; $i < count($palavras); $i++) {
        if (strlen($palavras[$i]) > strlen($palavraMaisLonga)) {
            $palavraMaisLonga = $palavras[$i];
        }
    }

    return $palavraMaisLonga;
}

function encontrarPalavraMaisCurta($palavras) {
    $palavraMaisCurta = $palavras[0] ?? '';

    for ($i = 0; $i < count($palavras); $i++) {
        if (strlen($palavras[$i]) < strlen($palavraMaisCurta)) {
            $palavraMaisCurta = $palavras[$i];
        }
    }

    return $palavraMaisCurta;
}

function contarPalavrasRepetidas($palavras) {
    $frequenciaPalavras = array_count_values($palavras);
    $quantidadeRepetidas = 0;

    foreach ($frequenciaPalavras as $quantidade) {
        if ($quantidade > 1) {
            $quantidadeRepetidas += $quantidade - 1;
        }
    }
    return $quantidadeRepetidas;
}

function listarCincoPalavrasMaisFrequentes($palavras) {
    $frequenciaPalavras = array_count_values($palavras);
    arsort($frequenciaPalavras);

    $lista = [];
    $contador = 0;

    foreach ($frequenciaPalavras as $palavra => $quantidade) {
        if ($contador >= 5) {
            break;
        }
        $lista[] = [
            'palavra' => $palavra,
            'quantidade' => $quantidade
        ];
        $contador++;
    }

    return $lista;
}

function formatarTexto($texto) {
    $textoSemEspacosDuplicados = removerEspacosDuplicados($texto);

    return ucwords($textoSemEspacosDuplicados);
}

$texto = '  PHP e uma linguagem poderosa. PHP e facil de aprender.  ';
$relatorio = processarTexto($texto);

echo 'Texto: ' . $texto . '<br> <br>';
echo 'Quantidade de caracteres: ' . $relatorio['quantidadeCaracteres'] . '<br>';
echo 'Quantidade de palavras: ' . $relatorio['quantidadePalavras'] . '<br>';
echo 'Quantidade de frases: ' . $relatorio['quantidadeFrases'] . '<br>';
echo 'Palavra mais longa: ' . $relatorio['palavraMaisLonga'] . '<br>';
echo 'Palavra mais curta: ' . $relatorio['palavraMaisCurta'] . '<br>';
echo 'Quantidade de palavras repetidas: ' . $relatorio['quantidadePalavrasRepetidas'] . '<br>';
echo 'Cinco palavras mais frequentes: <br>';

foreach ($relatorio['cincoPalavrasMaisFrequentes'] as $item) {
    echo $item['palavra'] . ' (' . $item['quantidade'] . ')<br>';
}

echo 'Texto sem espaços duplicados: ' . $relatorio['textoSemEspacosDuplicados'] . '<br>';
echo 'Texto formatado: ' . $relatorio['textoFormatado'] . '<br>';
