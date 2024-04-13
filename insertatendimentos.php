<?php
include_once './conexao.php';

$name = $_POST['name'];
$sessions = $_POST['sessions'];
$price = $_POST['price'];

$sql = "INSERT INTO atendimentos (name, sessions, price) VALUES ('$name', '$sessions', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: atendimentos.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>