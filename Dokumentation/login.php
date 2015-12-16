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
//------------------------------------------------------------



$sql = 'SELECT user_name from user WHERE user_name=' . '"' . $_POST["user"] . '"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $sql_password = 'SELECT password from user WHERE password="' . $_POST["password"] . '"';
    echo $sql_password;
    $result_password = $conn->query($sql_password);
    if ($result_password->num_rows > 0) {
        $password = $result_password->fetch_assoc()["password"];
        echo 'eingeloggt';
        header("Location: fragen_und_antworten_erstellen.html");
    } else {
        echo 'Falscher Passwort';
    }
} else {
    echo "User nicht vorhanden";
}

$conn->close();
