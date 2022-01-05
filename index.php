<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Augustana Alumni Information Collection</title>
	<style>
		h1 {text-align: center;
			background-color: white; 
		}
		
		p {text-align: center;}
		h2 {text-align: center;
			
		}
		form{text-align: center;}
		rect{text-align: center;}
	a {
  	color: lightpink;
		}
	body{
		background-image: url("oldmain.jpeg");
		background-repeat: no-repeat;
  		background-size: 1450px 700px;
	}
	.rectangle{
		padding-top: 40px;
  		width:100px;
  		height:100px;
		background-color: white;
  		border:1px solid #000; 
  		position: top;
  		text-align: center;
	}
</style>
</head>
<body>
	
	<h1>Augustana Alumni Information Bank </h1>
		<p> Hello Augustana Alumni and Friends! </p> 
		<p> Your very own local group of coders, "Team Vikings" have created
		a website to connect Augustana's past and future alumni. <br> The goal of the
		website is for alumni to network and enter the professional world. </p>
		<p> To access this wonderful bank of Alumni information you will need
		create a username and password. <br>Along with that you will submit 
		information like your phone number, address, email, area of work, and 
		social media handles. 
	</div>
	<h2> Sign up for Augie Alumni Bank </h2>
		<form action="/action_page.php">
			<label for="fname">Username:</label><br>
			<input type="text" id="fname" name="fname" value="username"><br>
			<p> Your username should be between 8 and 16 characters.</p>
			<label for="lname">Password:</label><br>
			<input type="text" id="lname" name="lname" value="password"><br>
			<p>Your password should contain at least one upper case letter and at 
				least one number and special character. </p>
			<input type="submit" value="Submit">
	  	</form> 
	  
		<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

		<h2>Style a link with a color</h2>

		<p><b><a href="https://www.augustana.edu" target="_blank">This is a link</a></b></p>
	
</body>
</html>

