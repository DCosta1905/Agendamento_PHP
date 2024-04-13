<?php
include_once './conexao.php';

$query_agendamento = "SELECT paciente, atendimento, start, end FROM consultas";

$result_consulta = $conn->prepare($query_agendamento);
$result_consulta->execute();

$consultas = [];

while($row_consultas = $result_consulta->fetch(PDO::FETCH_ASSOC)){

  extract($row_consultas);

  $consultas[] =[
    'paciente' => $paciente,
    'atendimento' => $atendimento,
    'start' => $start,
    'end' => $end,
  ];
}

echo json_encode($consultas);