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
//------------------------------------------------------------

$sql = 'INSERT INTO pollpage (frage, antwort)
VALUES ("' . $_POST["frage"]. '", "'. $_POST["antwort"].'")';

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
//echo 'Frage: '. ;
//echo '<br/>Antwort: '. $_POST['antwort'];
?>