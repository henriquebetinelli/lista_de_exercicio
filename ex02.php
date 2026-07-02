<?php

function inverterTexto($texto) {
    return strrev($texto);
}

$texto = "Sou muito legal";

echo "Texto original: " . $texto . "<br>";
echo "Quantidade de caracteres: " . strlen($texto) . "<br>";
echo "Texto invertido: " . inverterTexto($texto);   

