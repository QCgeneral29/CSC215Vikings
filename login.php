<?php
session_start();

// Make sure we were not passed blank values
$requiredFields = array('email', 'password');
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
$prepareStatement = "SELECT * FROM users WHERE email=?";
$stmt = $conn->prepare($prepareStatement);
$email = $_POST['email'];
$stmt->bind_param("s", $email);

if ($stmt) {
    $stmt->execute();
}else {
    die("Query creation failed");
}

$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Check if password is valid. Assign session information.
if (password_verify($_POST['password'], $row['password'])) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['phonenumber'] = $row['phonenumber'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['areaofwork'] = $row['areaofwork'];
    echo "Successful login.";
    header("Location: /dashboard.php");
    die("Please login.");
}else {
    echo "Incorrect password.";
}
?>