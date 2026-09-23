<?php

function ordenarAgenda($consultas) {
    usort($consultas, function($a, $b) {
        return strcmp($a["horario"], $b["horario"]);
    });

    return $consultas;
}

function contarPacientes($consultas) {
    $pacientes = [];

    foreach ($consultas as $consulta) {
        if (!in_array($consulta["paciente"], $pacientes)) {
            $pacientes[] = $consulta["paciente"];
        }
    }

    return count($pacientes);
}

function contarEspecialidades($consultas) {
    $especialidades = [];

    foreach ($consultas as $consulta) {
        $especialidade = $consulta["especialidade"];

        if (isset($especialidades[$especialidade])) {
            $especialidades[$especialidade]++;
        } else {
            $especialidades[$especialidade] = 1;
        }
    }

    return $especialidades;
}

function primeiroAtendimento($consultas) {
    $consultas = ordenarAgenda($consultas);

    return $consultas[0];
}

function ultimoAtendimento($consultas) {
    $consultas = ordenarAgenda($consultas);

    return $consultas[count($consultas) - 1];
}

function pesquisarPaciente($consultas, $nome) {
    $resultado = [];

    foreach ($consultas as $consulta) {
        if (strtolower($consulta["paciente"]) == strtolower($nome)) {
            $resultado[] = $consulta;
        }
    }

    return $resultado;
}

function verificarHorariosDuplicados($consultas) {
    $horarios = [];
    $duplicados = [];

    foreach ($consultas as $consulta) {
        $horario = $consulta["horario"];

        if (in_array($horario, $horarios)) {
            $duplicados[] = $horario;
        } else {
            $horarios[] = $horario;
        }
    }
    return array_unique($duplicados);
}

function organizarAgenda($consultas, $pacientePesquisado) {
    return [
        "totalConsultas" => count($consultas),
        "pacientesDiferentes" => contarPacientes($consultas),
        "consultasEspecialidade" => contarEspecialidades($consultas),
        "primeiroAtendimento" => primeiroAtendimento($consultas),
        "ultimoAtendimento" => ultimoAtendimento($consultas),
        "listaOrdenada" => ordenarAgenda($consultas),
        "pesquisaPaciente" => pesquisarPaciente($consultas, $pacientePesquisado),
        "horariosDuplicados" => verificarHorariosDuplicados($consultas)
    ];
}

$consultas = [
    [
        "paciente" => "Henrique",
        "especialidade" => "Cardiologia",
        "data" => "23/09/2026",
        "horario" => "08:00"
    ],
    [
        "paciente" => "Maria",
        "especialidade" => "Dermatologia",
        "data" => "23/09/2026",
        "horario" => "09:30"
    ],
    [
        "paciente" => "João",
        "especialidade" => "Cardiologia",
        "data" => "23/09/2026",
        "horario" => "10:00"
    ],
    [
        "paciente" => "Henrique",
        "especialidade" => "Ortopedia",
        "data" => "23/09/2026",
        "horario" => "11:30"
    ],
    [
        "paciente" => "Ana",
        "especialidade" => "Dermatologia",
        "data" => "23/09/2026",
        "horario" => "14:00"
    ]
];

$resultado = organizarAgenda($consultas, "Henrique");

echo "<h1>Gerenciador de Agenda</h1>";

echo "<h2>Total de consultas</h2>";
echo $resultado["totalConsultas"];

echo "<h2>Pacientes diferentes</h2>";
echo $resultado["pacientesDiferentes"];

echo "<h2>Consultas por especialidade</h2>";

foreach ($resultado["consultasEspecialidade"] as $especialidade => $quantidade) {
    echo $especialidade . ": " . $quantidade . "<br>";
}

echo "<h2>Primeiro atendimento</h2>";

echo $resultado["primeiroAtendimento"]["paciente"] . " - ";
echo $resultado["primeiroAtendimento"]["horario"];

echo "<h2>Último atendimento</h2>";

echo $resultado["ultimoAtendimento"]["paciente"] . " - ";
echo $resultado["ultimoAtendimento"]["horario"];

echo "<h2>Lista ordenada por horário</h2>";

foreach ($resultado["listaOrdenada"] as $consulta) {
    echo $consulta["horario"] . " - ";
    echo $consulta["paciente"] . " - ";
    echo $consulta["especialidade"] . "<br>";
}

echo "<h2>Pesquisa de paciente</h2>";

foreach ($resultado["pesquisaPaciente"] as $consulta) {
    echo $consulta["paciente"] . " - ";
    echo $consulta["especialidade"] . " - ";
    echo $consulta["horario"] . "<br>";
}


echo "<h2>Horários duplicados</h2>";

if (count($resultado["horariosDuplicados"]) > 0) {
    foreach ($resultado["horariosDuplicados"] as $horario) {
        echo $horario . "<br>";
    }

} else {
    echo "Não existem horários duplicados.";
}
