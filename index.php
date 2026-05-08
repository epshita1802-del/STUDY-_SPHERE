<?php
session_start();
include("config/db.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM students WHERE email='$email'");
    $user = $result->fetch_assoc();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['fullname'];
        $_SESSION['user_id'] = $user['id'];   // ✅ IMPORTANT FIX

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Study Sphere | Login</title>
    <link rel="stylesheet" href="assets/loginsihnup.css">
</head>

<body>

<div class="bg">

    <div class="signup-container">

        <!-- LEFT SIDE TEXT -->
        <div class="left-text">
            <h1>Study Sphere</h1>
            <p><b>Your Smart Study Companion</b></p>
        </div>

        <!-- LOGIN FORM -->
        <div class="form-card">
            <h2>Login</h2>

            <form method="POST">

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" name="login" class="primary-btn">
                    Sign In
                </button>

            </form>

            <a href="signup.php" class="login-btn">
                Don't have an account? Sign Up
            </a>

            <!-- ERROR MESSAGE -->
            <?php 
            if(isset($error)){
                echo "<div style='color:red; margin-top:10px;'>$error</div>";
            }
            ?>

        </div>

    </div>

</div>

</body>
</html>