<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
    header('Location: index.html');
    exit;
}

include_once './conexao.php';
// Check if the 'id' parameter is present in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SQL statement to delete the record
    $stmt = $conn->prepare("DELETE FROM pacients WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        
        header('Location: pacients.php');
        exit;
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>
