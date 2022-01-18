<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$warningMessage = "";
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{
	$driver = new mysqli_driver();
	$driver->report_mode = MYSQLI_REPORT_ALL;

	$warningMessage = "Account Created Successfully";
	$requiredFields = array('firstname', 'lastname', 'phonenumber', 'address', 'email', 'areaofwork', 'password');
	$error = false;
	foreach($requiredFields as $field) {
		if (empty($_POST[$field])) {
			$error = true;
		}
	}
	
	if ($error) {
		$warningMessage = "Error: All fields are required.";
	}else {
		// Assign inputs
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phonenumber = $_POST['phonenumber'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$areaofwork = $_POST['areaofwork'];
		$graduationyear = $_POST['graduationyear'];
		$profilepictureurl = '';
		//$password = $_POST['password'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			die("Invalid email format.");
		}
	
		$file_type = $_FILES['profilepicture']['type']; //returns the mimetype

		$allowed = array("image/jpeg");
		if(!in_array($file_type, $allowed)) {
		  die('Only jpg files are allowed.');
		}

		$uploaddir = 'data/profile_pictures/';
		$fileupload = $uploaddir . $firstname . "_" . $lastname . ".jpg";

		if (!file_exists($uploaddir)) {
			mkdir($uploaddir, 0777, true);
		}

		if (move_uploaded_file($_FILES['profilepicture']['tmp_name'], $fileupload)) {
			// File upload worked
			$profilepictureurl = $fileupload;
		}else {
			print_r($_FILES);
			print_r($fileupload);
			die("File upload failed: " . $_FILES['profilepicture']['error']);
		}

		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbname = "augie";
		// Create connection
		$conn = new mysqli($servername, $username, $dbpassword, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_eeror);
		}

		// Check if email exists
		$prepareStatement = "SELECT * FROM users WHERE email=?";
		$stmt = $conn->prepare($prepareStatement);
		$email = $_POST['email'];
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		// If email does not exist, create new account
		if(isset($row['id'])) {
			$warningMessage = "Account with email already exists";
		}else {
			// prepare and bind
			$prepareStatement = "INSERT INTO users (firstname, lastname, phonenumber, address, email, areaofwork, graduationyear, profilepicture, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($prepareStatement);
			$stmt->bind_param("ssisssiss",
				$firstname,$lastname, $phonenumber, $address, $email, $areaofwork, $graduationyear, $profilepictureurl, $password
			);
			
			$stmt->execute();
			
			$stmt->close();
			$conn->close();
		}
		

	}
} // End POST if statement
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Jason was here -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:ital@1&family=Varela&family=Varela+Round&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Augustana College Alumni Information</title>
	<style>
		h1 {text-align: center;
			 
		}
		
		p {text-align: center;}
		h2 {text-align: center;
			
		}
		form{text-align: center;}
	a {
  	color: rgb(255, 220, 0);
		}
	body{
		background-color:rgb(2, 66, 124);
	}
	
	hr.new {
		border: 10px solid rgb(255, 220, 0);
	}

	/* Section about two buttons*/
		.btn-group button {
  	background-color: rgb(255, 220, 0); /* Green background */
  	border: 2px black; /* Green border */
  	color: white; /* White text */
  	padding: 10px 24px; /* Some padding */
  	cursor: pointer; /* Pointer/hand icon */
  	float: left; /* Float the buttons side by side */
	text-align: center;  
	position: relative;
	left: 160px;
		}
/* Clear floats (clearfix hack) */
   .btn-group:after {
 	 content: "";
 	 clear: both;
 	 display: table;
	  text-align: center;  
	}

	.btn-group button:not(:last-child) {
  	border-right: none; /* Prevent double borders */
	  text-align: center;  
	}

	/* Add a background color on hover */
	.btn-group button:hover {
 	 background-color: rgb(2, 66, 124);
	  text-align: center;  
	}

	/* background for form*/
	.container {
  	text-align: center;
  	left: 0;
  	right: 0;
 	}

	.main {
  	position:relative;
  	width: 500px;
  	min-height: 100px;
  	margin: auto;
  	padding-top:15px;
	border-radius: 25px;
}

	.main:before {
  	content:'';
  	position: absolute;
  	width: 550px;
  	height: 465px;
  	margin: auto;
  	z-index: -1;
	background-color:lightgray;
  	border: 2px solid rgb(255, 220, 0);
  	left:-25px;
	border-radius: 25px;
}
	p2{text-align: center;}

	input[type="submit"]{
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}
</style>
</head>
<body>
	<hr class="new">
	<img src="AugieGrads.jpg" style="object-fit:cover; width: 100%; height:100px ;border: 1px solid rgb(255, 220, 0)">
	<h1 style="font-size:50px; position: center; font-family: VarelaRound; color: rgb(255, 220, 0)">Augustana College Alumni Network</h1>
		<p style = "color: white; font-size: 35px ;font-family: Varela"> Hello Augustana Alumni and Friends! </p> 
		<p style = "color: white; font-size: 25px ;font-family: Varela">Your very own local group of coders, "Team Vikings" have created
		a website to connect Augustana's past and future alumni. <br> The goal of the
		website is for alumni to network and enter the professional world. </p>
		<p style = "color: white; font-size: 25px;font-family: Varela"> To access this wonderful bank of Alumni information you will need
		create a username and password. <br>Along with that you will submit 
		information like your phone number, address, email, area of work, and 
		social media handles. 
</p>
		
	<div class="container">
	<div class="main">
	<h2> Sign up for Augie Alumni Bank </h2>
	<p style="color:red;"><?php echo $warningMessage ?></p>
		<form action="/index.php" method="post" enctype="multipart/form-data" attribute>
			<label for="firstname">First Name:</label><br>
			<input type="text" id="firstname" name="firstname" placeholder="" required><br>
			
			<label for="lastname">Last Name:</label><br>
			<input type="text" id="lastname" name="lastname" required><br>
			
			<label for="phonenumber">Phone Number:</label><br>
			<input type="number" id="phonenumber" name="phonenumber" required><br>
			
			<label for="address">Address:</label><br>
			<input type="text" id="address" name="address" required><br>
			
			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email" required><br>

			<label for="graduationyear">Graduation Year:</label><br>
			<input type="number" id="graduationyear" name="graduationyear" required><br>
			
			<label for="areaofwork">Area of Work:</label><br>
			<input type="text" id="areaofwork" name="areaofwork" required><br>

			<label for="profilepicture">Profile Picture:</label><br>
			<input type="file" id="profilepicture" name="profilepicture"><br>

			<label for="password">Password:</label><br>
			<input type="password" id="password" name="password" placeholder="" required><br>
			<p>Your password should contain at least one upper case letter and at 
				least one number and special character. </p>


			<div class="btn-group">
				<button type="button"><a href="/loginpage.php"; style = "color:white">Sign-In</a></button>
				<button><input type="submit"></input></button>
			</div>
	  	</form> 
	</div>
</div>

		<br>
		  <p><b><a href="https://www.augustana.edu" target="_blank">If you're looking for Augustana's webpage</a></b></p>
		  <img src="AugieLogo.png" alt="Augustana College" style = "width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;">
		  <img src="caps.png" style="object-fit:cover; width: 100%; height: 100px; border: 1px solid rgb(255, 220, 0);">
		  <hr class="new" >
		  

</body>
</html>

