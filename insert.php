<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phplogin";

$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}

//Get data from the form
$name = $_POST["name"];
$CPF = $_POST["CPF"];
$email = $_POST["email"];
$telephone_number = $_POST["telephone_number"];
$civil_state = $_POST["civil_state"];
$address = $_POST["address"];
$date_of_birth = $_POST["date_of_birth"];
$queixa = $_POST["queixa"];
$observacao = $_POST["observacao"];

// Insert data into the database
$sql = "INSERT INTO pacients (name, CPF, email, telephone_number, civil_state, address, date_of_birth, queixa, observacao)
VALUES ('$name', '$CPF', '$email', '$telephone_number', '$civil_state', '$address', '$date_of_birth', '$queixa', '$observacao')";

if($conn->query($sql) === TRUE){
  echo "Paciente cadastrado com sucesso";
  header('Location: pacients.php');
} else{
  echo "Error: ". $sql . "<br>" . $conn->error;
}
$conn->close();
?>