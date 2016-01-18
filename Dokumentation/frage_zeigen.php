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

while ($row = $result->fetch_assoc()) {
    echo 'Frage: ' . $row["frage"] . "<br>" . 'Antwort: ' . "<br>";
}
?>

<form action="#" method="POST">
    <textarea id="textarea_user_antwort" name="user_antwort" cols="40" rows="10"></textarea>
</form>
