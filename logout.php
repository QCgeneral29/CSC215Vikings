<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Logging you out...</h1>
    <?php 
    session_start();
    session_destroy();
    header("Location: /");
    die();
    ?>
</body>
</html>