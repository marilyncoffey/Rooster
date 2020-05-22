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
$sql = "CREATE TABLE Posts (
   ID int NOT NULL,
   PostText varchar(255) NOT NULL,
   PostUserName varchar(255),
   PostTime datetime,
   PRIMARY KEY (ID)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table Posts created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
