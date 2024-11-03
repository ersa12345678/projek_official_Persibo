<?php
session_start();

if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Klub Sepak Bola</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['login_user']; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>
