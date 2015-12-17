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

// select max user_id
$sql_id = "SELECT MAX(user_id) FROM user";
$result_id = $conn->query($sql_id);
$row = $result_id->fetch_assoc();
if (is_null($row["MAX(user_id)"])) {
    $id = 0;
} else {
    $id = $row["MAX(user_id)"];
}

// check if user existed
$sql = 'SELECT user_name from user WHERE user_name=' . '"' . $_POST["name"] . '"';
$result = $conn->query($sql);

if ($result->num_rows > 0) { // user exists
    echo "Dieser Benutzer ist bereits vorhanden.";
} else {
    // create new  user
    if (!empty($_POST["name"] && !empty($_POST["password"]))) {

        if ($_POST["password"] == $_POST["password_retype"]) {
            $id++;
            $sql = 'INSERT INTO user (user_id, user_name, password) VALUES (' . $id . ',"' . $_POST["name"] . '", "' . $_POST["password"] . '")';
            if ($conn->query($sql) === TRUE) {
                echo "Sie haben einen Account erfolgreich erstellt.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo 'Die Wiederholung des Passworts ist nicht korrekt.';
        }
    }
}

$conn->close();
