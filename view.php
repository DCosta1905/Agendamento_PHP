<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phplogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

if(isset($_GET['id'])){
  $patientId = $_GET['id'];

  $sql = "SELECT * FROM pacients where id = $patientId";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="view.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
  <title>Ver Detalhes</title>
</head>
<body class="loggedin">
<div class="patient-details">
    <h2>Detalhes Paciente</h2>
    <table>
        <tr>
            <th>ID</th>
            <td><?php echo $row['id']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <th>CPF</th>
            <td><?php echo $row['CPF']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
            <th>Telephone Number</th>
            <td><?php echo $row['telephone_number']; ?></td>
        </tr>
        <tr>
            <th>Civil State</th>
            <td><?php echo $row['civil_state']; ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $row['address']; ?></td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td><?php echo $row['date_of_birth']; ?></td>
        </tr>
        <tr>
            <th>Queixa</th>
            <td><?php echo $row['queixa']; ?></td>
        </tr>
        <tr>
            <th>Observacao</th>
            <td><?php echo $row['observacao']; ?></td>
        </tr>
    </table>
</div>
<a href="pacients.php"> Voltar a listagem </a>
</body>
</html>

<?php
    } else {
        echo "Patient not found.";
    }
} else {
    echo "Invalid patient ID.";
}

$conn->close();
?>