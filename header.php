<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReStyle</title>
</head>
<body>
    <style>
        body{
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color:#F5F5F7;
    color: #1F1F1F;
}
       header{
    background-color:#8B5CF6;
    color:#1F1F1F;
    padding: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
header h1{
    margin: 0;
}
.clean-link{
    color: inherit;
    text-decoration: none;
}
.clean-link:hover{
    color: #F5F5F7;
}
nav ul{
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 15px;
} 
    </style>
    <header>
    <h1><b><i><a href="home.php" class="clean-link">ReStyle</a></i></b></h1>
    <nav>
        <ul> 
        <li><a href="home.php" class="clean-link">Home</a></li>
        <li><a href="aboutus.php" class="clean-link">About</a></li>
        <li><a href="contactus.php" class="clean-link">Contact</a></li>
        <?php if(isset($page_title) && $page_title == "Login"): ?>
        <li><a href="register.php" class="clean-link">Register</a></li>
    <?php else: ?>
        <li><a href="login.php" class="clean-link">Login</a></li>
    <?php endif; ?>
        </ul>
    </nav>
    </header>
    <main>
