<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = trim($_POST["username"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $phone = trim($_POST["phone"] ?? '');
    $password = $_POST["password"] ?? '';

    if ($username === '' || $email === '' || $phone === '' || $password === '') {
        echo "<h2>Registration failed!</h2>";
        echo "<a href='register.php'>Try again.</a>";
    } else {
        echo "<h2>Registration successful!</h2>";
        echo "<a href='login.php'>Log in to your account</a>";
    }
}
?>