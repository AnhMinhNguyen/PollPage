<?php
$servername = "localhost";
$username = "minh";
$password = "12345";
$dbname = "php_project_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT frage, antwort from pollpage WHERE id >= (SELECT FLOOR(MAX(id) * RAND()) FROM pollpage) ORDER BY id LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    header("Location: frage_zeigen.php");
} else {
    echo "Es gibt zurzeit keine Frage.";
}

$conn->close();
