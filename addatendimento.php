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
  <title>Add Atendimento</title>
</head>
<body>
  <h2> Adicionar Novo Atendimento </h2>

  <form action="insertatendimentos.php" method="post">
    <!-- Input fields for each column -->
    <label for="name">Nome:</label>
    <input type="text" name="name" required><br>

    <label>Numero de Sessoes:</label><br>
        <select class="sessions" name="sessions" required>
            <option value="5">5</option>
            <option value="10">10</option>
        </select><br>

    <label for="price">Preço:</label>
    <input type="text" name="price" required><br>

    <input type="submit" value="Adicionar Atendimento">
  </form>

  <a href="atendimentos.php"> Voltar a listagem </a>
</body>
</html>