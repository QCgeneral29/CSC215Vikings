<?php 
    session_start();
    if(!isset($_SESSION['id'])) {
        header("Location: /loginpage.php");
        die("Please login.");
    }
    
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "augie";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:ital@1&family=Varela&family=Varela+Round&display=swap" rel="stylesheet">
    <title>Alumni Dashboard</title>
</head>
<body>
<header>
<h1 id="welcome-text">Welcome, <?php echo ucfirst(htmlspecialchars($_SESSION['firstname'])); ?></h1>
<h1 id="logout-text"><a href="/logout.php" class="yellow-link">Logout</a></h1>
</header>

<center><p>Here are all of our registered alumni:</p></center>

<div class="profile-row" id="profile-top">
    <div class="profile-item table-header">
        <!-- Profile Picture -->
    </div>
    <div class="profile-item table-header">
        Fullname
    </div>

    <div class="profile-item table-header">
        Graduation Year
    </div>

    <div class="profile-item table-header">
        Area of work
    </div>
    <div class="profile-item table-header">
        Email
    </div>
</div>

<?php 
    while($row = $result->fetch_assoc()) {
        echo '<div class="profile-row">';

        echo '<div class="profile-item">';
        echo '<img src="' . htmlspecialchars($row['profilepicture']) . '" alt="" class="profile-pictures">';
        echo '</div>';

        echo '<div class="profile-item">';
        echo ucfirst(htmlspecialchars($row['firstname']));
        echo ' ';
        echo ucfirst(htmlspecialchars($row['lastname']));
        echo '</div>';

        echo '<div class="profile-item">';
        echo htmlspecialchars($row['graduationyear']);
        echo '</div>';

        echo '<div class="profile-item">';
        echo ucfirst(htmlspecialchars($row['areaofwork']));
        echo '</div>';

        echo '<div class="profile-item">';
        echo '<a href="mailto:' . htmlspecialchars($row['email']) .'">';
        echo ucfirst(htmlspecialchars($row['email']));
        echo '</a>';
        echo '</div>';

        echo '</div>';
    }
?>

<img src="caps.png" class="footer-image">
<img src="AugieLogo.png" alt="Augustana College" class="logo">

</body>
</html>