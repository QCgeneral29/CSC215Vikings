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
  	border: 1px black; /* Green border */
  	color: white; /* White text */
  	padding: 10px 24px; /* Some padding */
  	cursor: pointer; /* Pointer/hand icon */
  	float: left; /* Float the buttons side by side */
	  text-align: center;  
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
	p2{text-align: center;}
</style>
</head>
<body>
	<hr class="new">
	<img src="AugieGrads.jpg" style="object-fit:cover; width: 1425px; height:100px ;border: 1px solid rgb(255, 220, 0)">
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
		
		
	<h2> Sign up for Augie Alumni Bank </h2>
		<form action="/register.php" method="post">
			<label for="firstname">First Name:</label><br>
			<input type="text" id="firstname" name="firstname" placeholder=""><br>
			
			<label for="lastname">Last Name:</label><br>
			<input type="text" id="lastname" name="lastname"><br>
			
			<label for="phonenumber">Phone Number:</label><br>
			<input type="text" id="phonenumber" name="phonenumber"><br>
			
			<label for="address">Address:</label><br>
			<input type="text" id="address" name="address"><br>
			
			<label for="email">Email:</label><br>
			<input type="text" id="email" name="email"><br>
			
			<label for="areaofwork">Area of Work:</label><br>
			<input type="text" id="areaofwork" name="areaofwork"><br>

			<label for="password">Password:</label><br>
			<input type="password" id="password" name="password" placeholder=""><br>
			<p>Your password should contain at least one upper case letter and at 
				least one number and special character. </p>

			<br>
			<input type="submit" value="Submit">
	  	</form> 
		  
		  <div class="btn-group">
			<button>Sign-In</button>
			<button>Sign-Up</button>
		</div>
		  <p><b><a href="https://www.augustana.edu" target="_blank">If you're looking for Augustana's webpage</a></b></p>
		  <img src="AugieLogo.png" alt="Augustana College" style = "width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;">
		  <img src="caps.png" style="object-fit:cover; width: 1425px; height: 100px; border: 1px solid rgb(255, 220, 0);">
		  <hr class="new" >
		  

</body>
</html>

