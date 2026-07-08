<?php
function analisarProdutos($produtos, $nomePesquisa = null) {
    $produtoMaisCaro = encontrarMaisCaro($produtos);
    $produtoMaisBarato = encontrarMaisBarato($produtos);
    $mediaPrecos = calcularMediaPrecos($produtos);
    $pesquisaProduto = pesquisarProduto($produtos, $nomePesquisa);
    
    return [
        'produtoMaisCaro' => $produtoMaisCaro,
        'produtoMaisBarato' => $produtoMaisBarato,
        'mediaPrecos' => $mediaPrecos,
        'pesquisaProduto' => $pesquisaProduto
    ];
}

function encontrarMaisCaro($produtos) {
    $maisCaro = null;
    $precoMaximo = 0;
    
    foreach ($produtos as $produto) {
        if ($produto['preco'] > $precoMaximo) {
            $precoMaximo = $produto['preco'];
            $maisCaro = $produto;
        }
    }
    
    return $maisCaro;
}

function encontrarMaisBarato($produtos) {
    $maisBarato = null;
    $precoMinimo = PHP_INT_MAX;
    
    foreach ($produtos as $produto) {
        if ($produto['preco'] < $precoMinimo) {
            $precoMinimo = $produto['preco'];
            $maisBarato = $produto;
        }
    }
    
    return $maisBarato;
}

function calcularMediaPrecos($produtos) {
    $somaPrecos = 0;
    
    foreach ($produtos as $produto) {
        $somaPrecos += $produto['preco'];
    }
    
    return $somaPrecos / count($produtos);
}

function pesquisarProduto($produtos, $nomePesquisa) {
    if ($nomePesquisa === null) {
        return null;
    }
    
    $nomePesquisa = strtolower($nomePesquisa);
    
    foreach ($produtos as $produto) {
        if (strtolower($produto['nome']) === $nomePesquisa) {
            return $produto;
        }
    }
    
    return "Produto não encontrado!";
}

$produtos = [
    ['nome' => 'Arroz', 'preco' => 5.50],
    ['nome' => 'Feijão', 'preco' => 8.00],
    ['nome' => 'Macarrão', 'preco' => 3.20],
    ['nome' => 'Açúcar', 'preco' => 6.80],
    ['nome' => 'Sal', 'preco' => 2.50]
];

//produto valido para pesquisa
$nomePesquisa = 'arroz'; 

//produto invalido para pesquisa
//$nomePesquisa = 'leite'; 

$resultado = analisarProdutos($produtos, $nomePesquisa);

echo "Produto mais caro: " . $resultado['produtoMaisCaro']['nome'] . " - R$ " . number_format($resultado['produtoMaisCaro']['preco'], 2, ',', '.') . "<br>";
echo "Produto mais barato: " . $resultado['produtoMaisBarato']['nome'] . " - R$ " . number_format($resultado['produtoMaisBarato']['preco'], 2, ',', '.') . "<br>";
echo "Média dos preços: R$ " . number_format($resultado['mediaPrecos'], 2, ',', '.') . "<br>";

if (is_array($resultado['pesquisaProduto'])) {
    echo "Pesquisa: " . $resultado['pesquisaProduto']['nome'] . " - R$ " . number_format($resultado['pesquisaProduto']['preco'], 2, ',', '.') . "<br>";
} else {
    echo "Pesquisa: " . $resultado['pesquisaProduto'] . "<br>";
}


