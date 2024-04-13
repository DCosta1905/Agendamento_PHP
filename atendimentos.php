<?php
session_start();
if(!isset( $_SESSION["loggedin"])){
  header('Location: index.html');
  exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="pacients.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Site - Fisioterapeuta Monica Oliveira</h1>
				<a href="home.php" class="icons"><i class="fas fa-home"></i>Home</a>
        <a href="pacients.php"><i class="fas fa-user-circle"></i>Pacientes</a>
        <a href="logout.php" class="icons"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<?php
		// Database Connection
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "phplogin";

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: ". $conn->connect_error);
		}
		$sql = "SELECT * FROM atendimentos";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sessões</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>";
				while( $row = $result->fetch_assoc() ) {
					echo "<tr>
					<td>{$row['id']}</td>
					<td>{$row['name']}</td>
					<td>{$row['sessions']}</td>
          <td>{$row['price']}</td>
					<td>
							<a href='editatendimentos.php?id={$row['id']}' class='buttons'>Edit</a>
							<a href='deleteatendimento.php?id={$row['id']}' class='buttons'>Delete</a>
					</td>
				</tr>";
				}
				echo "<a class='link_add' href='addatendimento.php'> Adicionar novo atendimento</a>";
				echo "</table";
		} else{	
			echo "0 results";
			echo "<a class='link_add' href='addatendimento.php'> Adicionar novo atendimento</a>";
		}
		$conn->close();
		?>
		
	</body>
</html>