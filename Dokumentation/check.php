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

$sql = "INSERT INTO pollpage (frage, antwort)
VALUES ('John', 'Doe')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//------------------------------------------------------------
$sql = "SELECT frage, antwort from pollpage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - Frage: " . $row["frage"]. " " . $row["antwort"]. "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
//echo 'Frage: '. $_POST['frage'];
//echo '<br/>Antwort: '. $_POST['antwort'];
?>
<form action="#" method="post">
    <input type="submit" value="Noch eine Frage hinzufügen" />
    <input type="submit" value="Abfragen" />
</form>
