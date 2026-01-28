<?php

session_start();
include_once "header.php";
include_once "database.php";
include_once "user.php";

$errors = [
'username' => '',
'email' => '',
'phone' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $db = new Database();
        $connection = $db->getConnection();
        $user = new User($connection);

        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        $haserrors = false;

        if($user->isDuplicate('username', $username)){
            $errors['username'] = 'Username already exists!';
            $haserrors = true;
        }
        if($user->isDuplicate('email', $email)){
            $errors['email'] = 'Email already exists!';
            $haserrors = true;
        }
        if(!empty($phone) && $user->isDuplicate('phone', $phone)){
            $errors['phone'] = 'Phone number already exists!';
            $haserrors = true;
        }
        if(!$haserrors){
            if($user->register(username: $username, email: $email, phone: $phone, password: $password)){
            header("Location: login.php");
            exit;
        } else {
            echo "<h2>Error registering user!</h2>";
        }
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="form-background">
    <div class="overlay"></div>
    <div class="container">
    <div class="RegisterForm">
        <h2>Register</h2>
        <form id="RegisterForm" method="POST" novalidate>

            <label for="username">Username</label>
            <input type="text" name="username" id="Username" placeholder="3-15 characters;letters,numbers, ._- allowed." required>
            <div id="usernameError" class="error"><?php echo $errors['username']; ?></div>

            <label for="email">Email</label>
            <input type="text" name="email" id="Email" placeholder="Email" required>
            <div id="emailError" class="error"><?php echo $errors['email']; ?></div>

            <label for="phone">Phone Number</label>
            <input type="tel" name="phone" id="PhoneNumber" placeholder="Phone Number" required>
            <div id="phoneError" class="error"><?php echo $errors['phone']; ?></div>

            <label for="password">Password</label>
            <input type="password" name="password" id="Password" placeholder="At least 8 characters,uppercase letter,digit and symbol." required>
            <div id="passwordError" class="error" aria-live="polite"></div>

            <label for="confirm">Confirm Password</label>
            <input type="password" name="confirm" id="Confirm" placeholder="Confirm your password" required>
            <div id="confirmError" class="error" aria-live="polite"></div>

            <button type="submit">Register</button>
            <div id="formSuccess" class="success" role="status" aria-live="polite"></div>
        </form>
         <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
        <script>
            const usernameRe = /^[a-zA-Z0-9._-]{3,15}$/;
            const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
            const phoneRe = /^\+?[\d\s\-()]{7,15}$/;
            const passwordRe = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

            const form = document.getElementById('RegisterForm');
            const username = document.getElementById('Username');
            const email = document.getElementById('Email');
            const phone = document.getElementById('PhoneNumber');
            const password = document.getElementById('Password');
            const confirm = document.getElementById('Confirm');

            const usernameError = document.getElementById('usernameError');
            const emailError = document.getElementById('emailError');
            const phoneError = document.getElementById('phoneError');
            const passwordError = document.getElementById('passwordError');
            const confirmError = document.getElementById('confirmError');
            const formSuccess = document.getElementById('formSuccess');

            function clearErrors(){
                [usernameError, emailError, phoneError, passwordError, confirmError, formSuccess].forEach(el => el.textContent = '');
            }
            function validateField(){
                let valid = true;
                clearErrors();

                if(!usernameRe.test(username.value.trim())){
                    usernameError.textContent = 'Invalid username!';
                    valid = false;
                }
                if(!emailRe.test(email.value.trim())){
                    emailError.textContent = 'Invalid email!';
                    valid = false;
                }
                if(phone.value.trim() !== '' && !phoneRe.test(phone.value.trim())){
                  phoneError.textContent = 'Invalid phone number!';
                  valid = false;
            }
                if(!passwordRe.test(password.value)){
                    passwordError.textContent = 'Invalid password!';
                    valid = false;
                }
                if(password.value !== confirm.value){
                    confirmError.textContent = 'Passwords do not match!';
                    valid = false;
                }
            return valid;
            }
            
            username.addEventListener('input', () => {if(usernameRe.test(username.value.trim()))usernameError.textContent = '';});
            email.addEventListener('input', () => {if(emailRe.test(email.value.trim()))emailError.textContent = '';});
            phone.addEventListener('input', () => {if(phone.value.trim() === '' || phoneRe.test(phone.value.trim())) phoneError.textContent = '';});
            password.addEventListener('input', () => {if(passwordRe.test(password.value))passwordError.textContent = '';});
            confirm.addEventListener('input', () => {if (password.value === confirm.value)confirmError.textContent = '';});
            form.addEventListener('submit', (e) => {
                if(!validateField()){
                    e.preventDefault();
                }
            });
        </script>
    </div>
    </div>
    <?php 
    include "footer.php";
        ?>
</body>
</html>
