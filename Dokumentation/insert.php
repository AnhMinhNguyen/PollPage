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
$sql_id="SELECT MAX(id) FROM pollpage";
$result_id = $conn->query($sql_id);
$row = $result_id->fetch_assoc();
if (is_null($row["MAX(id)"])) {
    $id = 0;
} else {
    $id = $row["MAX(id)"];
}

$id++;
$sql = 'INSERT INTO pollpage (id,frage, antwort)
VALUES (' . $id. ',"' . $_POST["frage"]. '", "'. $_POST["antwort"].'")';


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
//echo 'Frage: '. ;
//echo '<br/>Antwort: '. $_POST['antwort'];
?>