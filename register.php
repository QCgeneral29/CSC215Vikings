<?php
$requiredFields = array('firstname', 'lastname', 'phonenumber', 'address', 'email', 'areaofwork', 'password');
$error = false;
foreach($requiredFields as $field) {
    if (empty($_POST[$field])) {
        $error = true;
    }
}

if ($error) {
    die("All fields are required.");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "augie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_eeror);
}

// prepare and bind
$prepareStatement = "INSERT INTO users (firstname, lastname, phonenumber, address, email, areaofwork, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($prepareStatement);
$stmt->bind_param("ssissss",
    $firstname,$lastname, $phonenumber, $address, $email, $areaofwork, $password
);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];
$email = $_POST['email'];
$areaofwork = $_POST['areaofwork'];
$password = $_POST['password'];


$stmt->execute();


$stmt->close();
$conn->close();

?>