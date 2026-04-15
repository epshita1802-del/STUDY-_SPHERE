<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    // Redirect to login if not authenticated
    header("Location: /Studysphere/login.html");
    exit;
}

// Session is valid, continue
?>
