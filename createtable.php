<?php
// Make sure you go to localhost/phpmyadmin and create an "augie" database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "augie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
CREATE TABLE `users` (
    `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
    `firstname` varchar(100) NOT NULL,
    `lastname` varchar(100) NOT NULL,
    `phonenumber` int(9) unsigned NOT NULL,
    `graduationyear` int(4) unsigned NOT NULL,
    `address` varchar(255) NOT NULL,
    `email` varchar(100) NOT NULL,
    `areaofwork` varchar(255) NOT NULL,
    `profilepicture` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
  )
";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>