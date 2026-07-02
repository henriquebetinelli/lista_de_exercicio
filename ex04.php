<?php

function gerarSenha($tamanho) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()-_=+';
    $senha = '';

    for ($i = 0; $i < $tamanho; $i++) {
        $indice = random_int(0, strlen($caracteres) - 1);
        $senha .= $caracteres[$indice];
    }

    return $senha;
}

$senha = gerarSenha(12);
echo "Senha gerada: " . $senha;