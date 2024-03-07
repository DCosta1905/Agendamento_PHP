<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
  header('Location: index.html');
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="add.css" rel="stylesheet">
  <title>Add Pacient</title>
</head>
<body>
  <h2> Adicionar Novo Paciente </h2>

  <form action="insert.php" method="post">
    <!-- Input fields for each column -->
    <label for="name">Nome:</label>
    <input type="text" name="name" required><br>

    <label for="CPF">CPF:</label>
    <input type="text" name="CPF" required><br>

    <label for="email">Email:</label>
    <input type="text" name="email" required><br>

    <label for="telephone_number">Numero telefone:</label>
    <input type="text" name="telephone_number" required><br>

    <label for="civil_state">Estado Civil:</label>
    <input type="text" name="civil_state" required><br>

    <label for="address">Endereco:</label>
    <input type="text" name="address" required><br>

    <label for="date_of_birth">Data de Nascimento:</label>
    <input type="date" name="date_of_birth" required><br>

    <label for="queixa">Queixa:</label>
    <input type="text" name="queixa" required><br>

    <label for="observacao">Observação:</label>
    <input type="text" name="observacao" required><br>


    <input type="submit" value="Adicionar Paciente">
  </form>

  <a href="pacients.php"> Voltar a listagem </a>
</body>
</html>