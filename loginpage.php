<?php
session_start();
if(isset($_SESSION['id'])) {
    header("Location: /dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
    form { 
        margin: 0 auto; 
        margin-top: -10px;
        width:250px;
    }
    input[type=text] {
         width: 100%;
        padding: 2px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }
    input[type=password] {
         width: 100%;
        padding: 2px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }
    .button {
        background-color: rgb(2, 66, 124);
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius:25px;

    }
    .container {
  	    text-align: center;
  	    left: 0;
  	    right: 0;
 	}

	.main {
  	    position:relative;
  	    width: 300px;
  	    min-height: 100px;
  	    margin: auto;
  	    padding-top:205px;
    }

	.main:before {
  	    content:'';
  	    position: absolute;
  	    width: 350px;
  	    height: 330px;
  	    margin: auto;
  	    z-index: -1;
	    background-color:lightgray;
  	    border: 2px solid rgb(255, 220, 0);
  	    left:-25px;
        border-radius: 25px;
    }   
    body {
        background-image: url("oldmain.png");
        background-size: cover;
    }

    a.sign {color: black; text-decoration: none;}
    a.sign:link {color: black;}
    a.sign:visited {color: rgb(2, 66, 124);}
    a.sign:hover {color: rgb(255, 220, 0)}
    a.sign:active {color: fuschia;}

    a{
        color:rgb(255, 220, 0)
    }
    
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please Login</title>
    
</head>
<body>
   
</head>
    
    <div class="container">
    <div class="main">
    <form action="/login.php" method="post">
        <h1>Login</h1>
        <label for="email">Email:</label> <br>
        <input type="text" id="email" name="email"> <br>
        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password"> <br>
        <button class = "button">Login</button>
        <p> Welcome back Alumni, we missed you.</p>
        <p><a class="sign" href="index.php" target="">Back to Homepage</a></p>
    </form>
    </div>
    <br><br><br><br><br><br><br>
    <p><b><a href="https://www.augustana.edu" target="_blank">If you're looking for Augustana's webpage</a></b></p>

</body>

</html>