<?php
include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_edit_consulta = "UPDATE consultas SET start=:start, end=:end WHERE id=:id";

$edit_consulta = $conn->prepare($query_edit_consulta);

$edit_consulta->bind_param(':start', $dados['edit_start']);
$edit_consulta->bind_param(':end', $dados['edit_end']);
$edit_consulta->bind_param(':id', $dados['edit_id']);

if ($edit_event->execute()) {
  $retorna = ['status' => true, 'msg' => 'Evento editado com sucesso!', 'id' => $dados['edit_id'], 'title' => $dados['edit_title'], 'color' => $dados['edit_color'], 'start' => $dados['edit_start'], 'end' => $dados['edit_end']];
} else {
  $retorna = ['status' => false, 'msg' => 'Erro: Evento não editado!'];
}

echo json_encode($retorna);