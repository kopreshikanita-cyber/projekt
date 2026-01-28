<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = trim($_POST["username"] ?? '');
    $password = $_POST["password"] ?? '';

    if ($username === '' || $password === '') {
        echo "<h2>Login failed!</h2>";
        echo "<a href='login.php'>Try again.</a>";
    } else {
        echo "<h2>Login successful!</h2>";
        echo "<a href='home.php'>Go to your account</a>";
    }
}
?>