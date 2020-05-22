<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["EmailAddress"];
$pword = $_POST["Password"];
$fname = $_POST["FirstName"];
$lname = $_POST["LastName"];

$sql = "INSERT INTO RoosterUsers (EmailAddress, Password, FirstName, LastName)
VALUES ('". $email ."', '". $pword ."', '" . $fname . "','" . $lname . "')";

if ($conn->query($sql) === TRUE) {
    echo "Howdy, partner! Welcome to Rooster! <a href='login.html'>Login here</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
