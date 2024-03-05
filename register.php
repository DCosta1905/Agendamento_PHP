<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
  exit('Failed to connect to MySQL' . mysqli_connect_error());
}
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
  exit('Por favor complete o formulário');
}
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
  exit('Por favor complete o formulário');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    echo 'Usuário já existe, por favor crie outro';
  } else {
    if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?,?,?)')) {
      $_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $stmt->bind_param('sss', $_POST['username'], $_password, $_POST['email']);
      $stmt->execute();
      echo ('Usuário criado com sucesso');
      header(('Location: index.html'));
    } else {
      echo ('Não foi possível criar o usuário');
    }
  }
  $stmt->close();
} else {
  echo 'Could not prepare statement';
}
$con->close();
?>