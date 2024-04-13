<?php
if(isset($_GET['id']) && is_numeric( $_GET['id'] )){
  $id = $_GET['id'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "phplogin";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed". $conn->connect_error);
  }
  $sql = "SELECT * FROM atendimentos WHERE id = $id";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $sessions = $row['sessions'];
    $price = $row['price'];
  }else{
    echo "Error: Unable to fetch patient data.";
    exit;
  }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $sessions = $_POST["sessions"];
    $price = $_POST["price"];

    $update_sql = "UPDATE atendimentos SET name='$name', sessions='$sessions', price='$price'  WHERE id=$id";

    if($conn->query($update_sql) === TRUE){
      echo "Patient information updated successfully!";
      header('Location: atendimentos.php');
  } else{
    echo "Error updating patient information: ". $conn->error;
  }
}
$conn->close();
} else{
  echo "Invalid pacient ID";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="edit.css" type="text/css">
  <title>Editar Atendimento</title>
</head>
<body class="loggedin">
    <div class="content">
        <h2>Editar Informação Atendimento</h2>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>">

            <label for="sessions">Numero de Sessões:</label>
            <input type="text" name="sessions" value="<?php echo $sessions; ?>">

            <label for="price">Preço:</label>
            <input type="text" name="price" value="<?php echo $price; ?>" >
            <button type="submit">Update Information</button>
        </form>
    </div>
    <a href="atendimentos.php"> Voltar a listagem </a>
</body>
</html>
</body>
</html>