<?php

function calcularIMC($peso, $altura) {
    return $peso / ($altura * $altura);
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function gerarSenha() {
    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $senha = "";

    for ($i = 0; $i < 8; $i++) {
        $senha .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }

    return $senha;
}

function contarVogais($texto) {
    $texto = strtolower($texto);
    $vogais = 0;

    for ($i = 0; $i < strlen($texto); $i++) {
        if (strpos("aeiou", $texto[$i]) !== false) {
            $vogais++;
        }
    }

    return $vogais;
}

function inverterTexto($texto) {
    return strrev($texto);
}

function calcularIdade($anoNascimento) {
    return date("Y") - $anoNascimento;
}

function converterMoeda($valor, $cotacao) {
    return $valor * $cotacao;
}

function formatarTelefone($telefone) {
    return "(" . substr($telefone, 0, 2) . ") " .
        substr($telefone, 2, 5) . "-" .
        substr($telefone, 7);
}

function gerarSaudacao() {
    $hora = date("H");

    if ($hora < 12) {
        return "Bom dia!";
    } elseif ($hora < 18) {
        return "Boa tarde!";
    } else {
        return "Boa noite!";
    }
}

function validarSenhaForte($senha) {
    return strlen($senha) >= 8 &&
        preg_match("/[A-Z]/", $senha) &&
        preg_match("/[a-z]/", $senha) &&
        preg_match("/[0-9]/", $senha);
}

?>
Exercício 15 — index.php
<?php

include "funcoes.php";

echo "<h1>Biblioteca de Funções</h1>";

echo "<h2>1. Calcular IMC</h2>";
echo calcularIMC(70, 1.75);

echo "<h2>2. Validar E-mail</h2>";

if (validarEmail("teste@gmail.com")) {
    echo "E-mail válido";
} else {
    echo "E-mail inválido";
}

echo "<h2>3. Gerar Senha</h2>";
echo gerarSenha();

echo "<h2>4. Contar Vogais</h2>";
echo contarVogais("Programação");

echo "<h2>5. Inverter Texto</h2>";
echo inverterTexto("PHP");

echo "<h2>6. Calcular Idade</h2>";
echo calcularIdade(2008) . " anos";

echo "<h2>7. Converter Moeda</h2>";
echo converterMoeda(100, 5);

echo "<h2>8. Formatar Telefone</h2>";
echo formatarTelefone("47999999999");

echo "<h2>9. Gerar Saudação</h2>";
echo gerarSaudacao();

echo "<h2>10. Validar Senha Forte</h2>";

if (validarSenhaForte("Senha123")) {
    echo "Senha forte";
} else {
    echo "Senha fraca";
}
