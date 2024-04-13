<?php
include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Criar a QUERY cadastrar evento no banco de dados
$query_cad_consulta = "INSERT INTO consultas (paciente, atendimento, start, end) VALUES (:paciente, :atendimento, :start, :end)";

// Prepara a QUERY
$cad_event = $conn->prepare($query_cad_event);

// Substituir o link pelo valor
$cad_event->bindParam(':title', $dados['cad_pacient']);
$cad_event->bindParam(':color', $dados['cad_atendimento']);
$cad_event->bindParam(':start', $dados['cad_start']);
$cad_event->bindParam(':end', $dados['cad_end']);

// Verificar se consegui cadastrar corretamente
if ($cad_event->execute()) {
    $retorna = ['status' => true, 'msg' => 'Evento cadastrado com sucesso!', 'id' => $conn->lastInsertId(), 'title' => $dados['cad_title'], 'color' => $dados['cad_color'], 'start' => $dados['cad_start'], 'end' => $dados['cad_end']];
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não cadastrado!'];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);
