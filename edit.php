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
  $sql = "SELECT * FROM pacients WHERE id = $id";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $CPF = $row['CPF'];
    $email = $row['email'];
    $telephone_number = $row['telephone_number'];
    $civil_state = $row['civil_state'];
    $address = $row['address'];
    $date_of_birth = $row['date_of_birth'];
    $queixa = $row['queixa'];
    $observacao = $row['observacao'];
  }else{
    echo "Error: Unable to fetch patient data.";
    exit;
  }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $CPF = $_POST["CPF"];
    $email = $_POST["email"];
    $telephone_number = $_POST["telephone_number"];
    $civil_state = $_POST["civil_state"];
    $address = $_POST["address"];
    $date_of_birth = $_POST["date_of_birth"];
    $queixa = $_POST["queixa"];
    $observacao = $_POST["observacao"];

    $update_sql = "UPDATE pacients SET name='$name', CPF='$CPF', email='$email', telephone_number='$telephone_number', civil_state='$civil_state', address='$address', date_of_birth='$date_of_birth', queixa='$queixa', observacao='$observacao' WHERE id=$id";

    if($conn->query($update_sql) === TRUE){
      echo "Patient information updated successfully!";
      header('Location: pacients.php');
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
  <title>Editar Paciente</title>
</head>
<body class="loggedin">
    <div class="content">
        <h2>Editar Informação Paciente</h2>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>">

            <label for="CPF">CPF:</label>
            <input type="text" name="CPF" value="<?php echo $CPF; ?>">

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" >

            <label for="telephone_number">Numero Telefone:</label>
            <input type="text" name="telephone_number" value="<?php echo $telephone_number; ?>" >

            <label for="civil_state">Estado Civil:</label>
            <input type="text" name="civil_state" value="<?php echo $civil_state; ?>" >

            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo $address; ?>" >

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" value="<?php echo $date_of_birth; ?>" >

            <label for="queixa">Queixa:</label>
            <textarea name="queixa" ><?php echo $queixa; ?></textarea>

            <label for="observacao">Observacao:</label>
            <textarea name="observacao"><?php echo $observacao; ?></textarea>

            <button type="submit">Update Information</button>
        </form>
    </div>
    <a href="pacients.php"> Voltar a listagem </a>
</body>
</html>
</body>
</html>