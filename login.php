<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form login
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Query untuk mengecek username dan password
    $sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['login_user'] = $username;
        header("location: welcome.php");
    } else {
        $error = "Username atau Password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Klub Sepak Bola</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label>Username :</label>
        <input type="text" name="username" required><br>
        <label>Password :</label>
        <input type="password" name="password" required><br>
        <input type="submit" value=" Login ">
    </form>
    <div><?php if(isset($error)){ echo $error; } ?></div>
</body>
</html>
