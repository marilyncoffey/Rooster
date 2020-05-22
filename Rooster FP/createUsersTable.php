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

// sql to create table
$sql = "CREATE TABLE RoosterUsers (
EmailAddress VARCHAR(60) NOT NULL PRIMARY KEY,
Password VARCHAR(50) NOT NULL,
FirstName VARCHAR(30) NOT NULL,
LastName VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table RoosterUsers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
