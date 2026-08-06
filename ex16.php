<?php
function analisarSenha($senha) {
    return [
        'quantidadeMaiusculas' => contarLetrasMaiusculas($senha),
        'quantidadeMinusculas' => contarLetrasMinusculas($senha),
        'quantidadeNumeros' => contarNumeros($senha),
        'quantidadeCaracteresEspeciais' => contarCaracteresEspeciais($senha),
        'tamanho' => strlen($senha),
        'nivelDeSeguranca' => classificarSenha($senha)
    ];
}

function contarLetrasMaiusculas($senha) {
    $quantidade = 0;
    for ($i = 0; $i < strlen($senha); $i++) {
        $caractere = $senha[$i];
        if ($caractere >= 'A' && $caractere <= 'Z') {
            $quantidade++;
        }
    }
    return $quantidade;
}

function contarLetrasMinusculas($senha) {
    $quantidade = 0;
    for ($i = 0; $i < strlen($senha); $i++) {
        $caractere = $senha[$i];
        if ($caractere >= 'a' && $caractere <= 'z') {
            $quantidade++;
        }
    }
    return $quantidade;
}

function contarNumeros($senha) {
    $quantidade = 0;
    for ($i = 0; $i < strlen($senha); $i++) {
        $caractere = $senha[$i];
        if ($caractere >= '0' && $caractere <= '9') {
            $quantidade++;
        }
    }
    return $quantidade;
}

function contarCaracteresEspeciais($senha) {
    $quantidade = 0;
    for ($i = 0; $i < strlen($senha); $i++) {
        $caractere = $senha[$i];
        if (!($caractere >= '0' && $caractere <= '9') && !($caractere >= 'A' && $caractere <= 'Z') && !($caractere >= 'a' && $caractere <= 'z')) {
            $quantidade++;
        }
    }
    return $quantidade;
}

function classificarSenha($senha) {
    $tamanho = strlen($senha);
    if ($tamanho < 8) {
        return 'Fraca';
    }

    $criterios = [
        contarLetrasMaiusculas($senha) > 0,
        contarLetrasMinusculas($senha) > 0,
        contarNumeros($senha) > 0,
        contarCaracteresEspeciais($senha) > 0
    ];

    $criteriosAtendidos = 0;
    for ($i = 0; $i < count($criterios); $i++) {
        if ($criterios[$i]) {
            $criteriosAtendidos++;
        }
    }

    if ($criteriosAtendidos === 4) {
        return 'Muito Forte';
    }

    if ($criteriosAtendidos === 3) {
        return 'Forte';
    }

    if ($criteriosAtendidos === 2) {
        return 'Média';
    }

    return 'Fraca';
}

$senha = 'Senha@2026';
$relatorio = analisarSenha($senha);

echo 'Senha: ' . $senha . '<br> <br>';
echo 'Quantidade de letras maiúsculas: ' . $relatorio['quantidadeMaiusculas'] . '<br>';
echo 'Quantidade de letras minúsculas: ' . $relatorio['quantidadeMinusculas'] . '<br>';
echo 'Quantidade de números: ' . $relatorio['quantidadeNumeros'] . '<br>';
echo 'Quantidade de caracteres especiais: ' . $relatorio['quantidadeCaracteresEspeciais'] . '<br>';
echo 'Tamanho da senha: ' . $relatorio['tamanho'] . '<br>';
echo 'Nível de segurança: ' . $relatorio['nivelDeSeguranca'] . '<br>';
