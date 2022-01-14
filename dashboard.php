<?php 
    session_start();
    if(!isset($_SESSION['id'])) {
        header("Location: /logintestpage.html");
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
    <title>Alumni Dashboard</title>
</head>
<body>
<header>
<h1 id="welcome-text">Welcome, <?php echo ucfirst(htmlspecialchars($_SESSION['firstname'])); ?></h1>
<h1 id="logout-text"><a href="/logout.php">Logout</a></h1>
</header>

<p>Here are all of our registered alumni:</p>

<div class="profile-row" id="profile-top">
    <div class="profile-item">
        <!-- Profile Picture -->
    </div>
    <div class="profile-item">
        First Name
    </div>
    <div class="profile-item">
        Last Name
    </div>
    <div class="profile-item">
        Area of work
    </div>
    <div class="profile-item">
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
        echo '</div>';

        echo '<div class="profile-item">';
        echo ucfirst(htmlspecialchars($row['lastname']));
        echo '</div>';

        echo '<div class="profile-item">';
        echo ucfirst(htmlspecialchars($row['areaofwork']));
        echo '</div>';

        echo '<div class="profile-item">';
        echo ucfirst(htmlspecialchars($row['email']));
        echo '</div>';

        echo '</div>';
    }
?>
</body>
</html>