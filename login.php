<?php 
session_start();
  $page_title = "Login";

    include_once "database.php";
    include_once "user.php";

    $error_message = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $db = new Database();
        $conn = $db->getConnection();
        $user = new User($conn);

        $username = trim($_POST["username"] ?? '');
        $password = $_POST["password"] ?? '';

        if ($user->login($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error_message = "Invalid login credentials!";
    }
}
 ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php 
    include_once "header.php";
    ?>
    <div class="login-page">
  <div class="login-background">
        <div class="overlay"></div> 
        <div class="container">
            <div class="LoginForm">
            <h2>Login</h2>
            <?php if (!empty($error_message)): ?>
        <div class="error-message" role="alert" aria-live="assertive">
            <?php echo htmlspecialchars($error_message); ?>
        </div>
    <?php endif; ?>
            <form id="loginForm" method="POST" novalidate>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
                <div id="usernameError" class="error" aria-live="polite"></div>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <div id="passwordError" class="error" aria-live="polite"></div>

                <button type="submit">Login</button>
                <div id="formSuccess" class="success" role="status" aria-live="polite"></div>
            </form>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
        <script>
            const usernameRe =  /^[a-zA-Z0-9._-]{3,15}$/;
            const passwordRe = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

            const form = document.getElementById('loginForm');
            const username = document.getElementById('username');
            const password = document.getElementById('password');

            const usernameError = document.getElementById('usernameError');
            const passwordError = document.getElementById('passwordError');
            const formSuccess = document.getElementById('formSuccess');

            function clearErrors(){
                [usernameError, passwordError, formSuccess].forEach(el => el.textContent = '');
            }
            function validateField(){
                let valid = true;
                clearErrors();
            
                if(!usernameRe.test(username.value.trim())){
                    usernameError.textContent = 'Invalid username!';
                    valid = false;
                }
                if(!passwordRe.test(password.value)){
                    passwordError.textContent = 'Invalid password!';
                    valid = false;
                }
                return valid;
            }
            username.addEventListener('input', () => {if (usernameRe.test(username.value.trim())) usernameError.textContent = '';});
            password.addEventListener('input', () => {if (passwordRe.test(password.value)) passwordError.textContent = '';});

            form.addEventListener('submit', (e) => {
                if(!validateField()){
                e.preventDefault();
            }

        });
        </script>
    </div>
</div>
    <?php 
    include_once "footer.php";
        ?>
</body>
</html>