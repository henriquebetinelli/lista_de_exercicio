<?php

function mascararCpf($cpf) {
    $tamanho = strlen($cpf);

    if ($tamanho <= 4) {
        return $cpf;
    }

    $mascara = str_repeat('*', $tamanho - 4);
    $ultimosDigitos = substr($cpf, -4);

    return $mascara . $ultimosDigitos;
}

$cpf = "12345678909";
echo "CPF original: " . $cpf . "<br>";
echo "CPF mascarado: " . mascararCpf($cpf);