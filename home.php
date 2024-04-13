<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
  header('Location: index.html');
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="loggedin">
  <nav class="navtop">
    <div>
      <h1>Site - Fisioterapeuta Monica Oliveira</h1>
      <a href="pacients.php"><i class="fas fa-user-circle"></i>Pacientes</a>
      <a href="atendimentos.php"><i class="fa-solid fa-notes-medical"></i>Atendimentos</a>
      <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
      <a href="agenda.php"><i class="fa-solid fa-calendar"></i>Agenda</a>
    </div>
  </nav>
  <div style="position: relative; width: 100%; height: 0; padding-top: 56.2225%;
 padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
  <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
    src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAF-RK7jK_M&#x2F;l9x1P4t-2CgoFRvmyw_zFw&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
  </iframe>
</div>


</body>

</html>