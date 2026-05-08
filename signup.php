<?php
include("config/db.php");

if(isset($_POST['signup'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = $conn->query("SELECT * FROM students WHERE email='$email'");

    if($check->num_rows > 0){
        $error = "Email already exists!";
    } else {

        $sql = "INSERT INTO students (fullname, email, password)
                VALUES ('$name', '$email', '$password')";

        if($conn->query($sql)){
            header("Location: index.php"); // go to login
            exit();
        } else {
            $error = "Signup failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Study Sphere | Sign Up</title>
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

        <!-- FORM -->
        <div class="form-card">
            <h2>Create Account</h2>

            <form method="POST">

                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit" name="signup" class="primary-btn">
                    Sign Up
                </button>

            </form>

            <!-- LOGIN LINK -->
            <a href="index.php" class="login-btn">
                Already have an account? Login
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