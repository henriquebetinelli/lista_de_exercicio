<?php
function criptografarMensagem($texto, $deslocamento = 3) {
    $resultado = '';

    for ($i = 0; $i < strlen($texto); $i++) {
        $caractere = $texto[$i];

        if (ctype_alpha($caractere)) {
            $base = ctype_upper($caractere) ? ord('A') : ord('a');
            $resultado .= chr((ord($caractere) - $base + $deslocamento) % 26 + $base);
        } else {
            $resultado .= $caractere;
        }
    }

    return $resultado;
}

function descriptografarMensagem($texto, $deslocamento = 3) {
    return criptografarMensagem($texto, 26 - ($deslocamento % 26));
}

$mensagemOriginal = "Proteja mensagens pequenas com cifra de César";
$mensagemCriptografada = criptografarMensagem($mensagemOriginal);
$mensagemDescriptografada = descriptografarMensagem($mensagemCriptografada);

echo "Texto original: " . $mensagemOriginal . "<br>";
echo "Texto criptografado: " . $mensagemCriptografada . "<br>";
echo "Texto descriptografado: " . $mensagemDescriptografada . "<br>";
