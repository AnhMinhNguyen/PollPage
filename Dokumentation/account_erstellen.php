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
$sql_id = "SELECT MAX(user_id) FROM user";
$result_id = $conn->query($sql_id);
$row = $result_id->fetch_assoc();
if (is_null($row["MAX(user_id)"])) {
    $id = 0;
} else {
    $id = $row["MAX(user_id)"];
}

if (!empty($_POST["name"] && !empty($_POST["password"]))) {

    if ($_POST["password"] == $_POST["password_retype"]) {
        $id++;
        $sql = 'INSERT INTO user (user_id, user_name, password)
VALUES (' . $id . ',"' . $_POST["name"] . '", "' . $_POST["password"] . '")';


        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo 'Passwort nicht gleich.';
    }
}



$conn->close();
//echo 'Frage: '. ;
//echo '<br/>Antwort: '. $_POST['antwort'];
?>
