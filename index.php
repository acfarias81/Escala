<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escala de Horários</title>
    <!-- Adicionando Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            color: #007bff;
        }
        h3 {
            color: #6c757d;
        }
        p {
            color: #495057;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <form method="POST" action="">
        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="data_fim">Data de Fim:</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="escala">Escala:</label>
            <select id="escala" name="escala" class="form-control" required>
                <option value="">Selecione uma escala</option>
                <option value="Folga">Folga</option>
                <option value="Virada">Virada</option>
                <option value="Sobreaviso">Sobreaviso</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mostrar Horários</button>
    </form>

    <div class="mt-5">

<?php
// Simule dados de funcionários e seus horários
$funcionarios = [
    'Renan' => [
        'Folga' => [
            'SEG' => '07:30 - 12:00 | 13:00 - 17:30',
            'TER' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUI' => '07:30 - 12:00 | 13:00 - 17:30',
            'SEX' => '08:30 - 12:00 | 13:00 - 17:30',
            'SAB' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'DOM' => 'FOLGA - FOLGA | FOLGA - FOLGA',
        ],
        'Virada' => [
            'SEG' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'TER' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUI' => '07:30 - 12:00 | 13:00 - 17:30',
            'SEX' => '07:30 - 12:00 | 13:00 - 16:30',
            'SAB' => '08:00 - 00:00 | 20:00 - 23:00',
            'DOM' => '00:00 - 02:00 | 07:00 - 11:00',
        ],
        'Sobreaviso' => [
            'SEG' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'TER' => 'FOLGA - FOLGA | 13:00 -  17:00',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:00',
            'QUI' => '07:30 - 12:00 | 13:00 - 17:00',
            'SEX' => '07:30 - 12:00 | 13:00 - 17:00',
            'SAB' => '08:00 - 12:00 | 14:00 - 20:00',
            'DOM' => '07:00 - 11:00 | 00:00 - 00:00',
        ],
    ],
    'Antonio' => [
        'Virada' => [
            'SEG' => '07:30 - 12:00 | 13:00 - 17:30',
            'TER' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUI' => '07:30 - 12:00 | 13:00 - 16:30',
            'SEX' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'SAB' => '08:00 - 00:00 | 20:00 - 23:00',
            'DOM' => '00:00 - 02:00 | 07:00 - 11:00',
        ],
        'Sobreaviso' => [
            'SEG' => '07:30 - 12:00 | 13:00 - 17:00',
            'TER' => '07:30 - 12:00 | 13:00 - 17:00',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:00',
            'QUI' => '07:30 - 12:00 | FOLGA - FOLGA',
            'SEX' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'SAB' => '08:00 - 12:00 | 14:00 - 20:00',
            'DOM' => '07:00 - 11:00 | 00:00 - 00:00',
        ],
        'Folga' => [
            'SEG' => '07:30 - 12:00 | 13:00 - 17:30',
            'TER' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUI' => '07:30 - 12:00 | 13:00 - 17:30',
            'SEX' => '08:30 - 12:00 | 13:00 - 17:30',
            'SAB' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'DOM' => 'FOLGA - FOLGA | FOLGA - FOLGA',
        ],
    ],
     'Tiago' => [
        'Sobreaviso' => [
            'SEG' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'TER' => 'FOLGA - FOLGA | 13:00 - 17:00',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:00',
            'QUI' => '07:30 - 12:00 | 13:00 - 17:00',
            'SEX' => '07:30 - 12:00 | 13:00 - 17:00',
            'SAB' => '08:00 - 12:00 | 14:00 - 20:00',
            'DOM' => '07:00 - 11:00 | 00:00 - 00:00',
        ],
        'Folga' => [
            'SEG' => '07:30 - 12:00 | 13:00 - 17:30',
            'TER' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUI' => '07:30 - 12:00 | 13:00 - 17:30',
            'SEX' => '08:30 - 12:00 | 13:00 - 17:30',
            'SAB' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'DOM' => 'FOLGA - FOLGA | FOLGA - FOLGA',
        ],
        'Virada' => [
            'SEG' => 'FOLGA - FOLGA | FOLGA - FOLGA',
            'TER' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUA' => '07:30 - 12:00 | 13:00 - 17:30',
            'QUI' => '07:30 - 12:00 | 13:00 - 16:30',
            'SEX' => '00:00 - 00:00 | 20:00 - 23:00',
            'SAB' => '08:00 - 00:00 | 20:00 - 23:00',
            'DOM' => '00:00 - 02:00 | 07:00 - 11:00',
        ],
    ],
];

// Verifica se os dados foram submetidos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_inicio = new DateTime($_POST['data_inicio']);
    $data_fim = new DateTime($_POST['data_fim']);
    $escala_selecionada = $_POST['escala'];

    echo "<h2>Escala de Horários:</h2>";
    
     //ele entra nesta condição caso tenha sido selecionado folga
    switch ($escala_selecionada) {
        case 'Folga':
            echo "<h3>Renan - Folga:</h3>";
            foreach ($funcionarios['Renan']['Folga'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p> $dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            
            echo "<h3>Antonio - Virada:</h3>";
            foreach ($funcionarios['Antonio']['Virada'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p>$dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            
            echo "<h3>Tiago - Sobreaviso:</h3>";
            foreach ($funcionarios['Tiago']['Sobreaviso'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p>$dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            break;
             //ele entra nesta condição caso tenha sido selecionado virada
        case 'Virada':
            echo "<h3>Renan - Virada:</h3>";
            foreach ($funcionarios['Renan']['Virada'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p>$dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            
            echo "<h3>Antonio - Sobreaviso:</h3>";
            foreach ($funcionarios['Antonio']['Sobreaviso'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p>$dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            
            echo "<h3>Tiago - Folga:</h3>";
            foreach ($funcionarios['Tiago']['Folga'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p>$dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            break;
             //ele entra nesta condição caso tenha sido selecionado sobre aviso
        case 'Sobreaviso':
            echo "<h3>Renan - Sobreaviso:</h3>";
            foreach ($funcionarios['Renan']['Sobreaviso'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p>$dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            
            echo "<h3>Antonio - Folga:</h3>";
            foreach ($funcionarios['Antonio']['Folga'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p>$dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            
            echo "<h3>Tiago - Virada:</h3>";
            foreach ($funcionarios['Tiago']['Virada'] as $dia => $horario) {
                $numero_dia = getNumeroDia($dia);
                $data_correspondente = clone $data_inicio;
                $data_correspondente->modify("+$numero_dia days");
                echo "<p>$dia = " . $data_correspondente->format('d/m/Y') . " $horario</p>";
            }
            break;
        default:
            echo 'Selecione uma escala acima.';
            break;
    }
} else {
    echo 'Selecione um intervalo de datas e uma escala acima.';
}

// Função para obter o número do dia da semana
function getNumeroDia($dia) {
    switch ($dia) {
        case 'SEG':
            return 1;
        case 'TER':
            return 2;
        case 'QUA':
            return 3;
        case 'QUI':
            return 5;
        case 'SEX':
            return 5;
        case 'SAB':
            return 6;
        case 'DOM':
            return 7;
        default:
            return 0;
    }
}
?>
    </div>
</div>

<!-- Adicionando JavaScript Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
