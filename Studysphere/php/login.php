<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost","root","rokamath100/100","Studysphere");

if ($conn->connect_error) {
    http_response_code(500);
    echo "DB Connection Error: " . $conn->connect_error;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed';
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Debug log
error_log("Login attempt: email=$email, password_len=" . strlen($password));

if ($email === '' || $password === '') {
    http_response_code(400);
    echo 'Missing required fields';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo 'Invalid email';
    exit;
}

$stmt = $conn->prepare("SELECT id, password, semester, fullname FROM students WHERE email = ?");
if (!$stmt) {
    http_response_code(500);
    echo $conn->error;
    $conn->close();
    exit;
}

$stmt->bind_param('s', $email);
if (!$stmt->execute()) {
    http_response_code(500);
    echo $stmt->error;
    $stmt->close();
    $conn->close();
    exit;
}

$result = $stmt->get_result();

// Debug: Show if email exists
if ($result->num_rows === 0) {
    http_response_code(401);
    echo 'Email not found';
    $stmt->close();
    $conn->close();
    exit;
}

$row = $result->fetch_assoc();
$storedHash = $row['password'];
$semester = $row['semester'];

$verified = password_verify($password, $storedHash);

if ($verified) {
    // Store user info in session
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['email'] = $email;
    $_SESSION['semester'] = $semester;
    $_SESSION['fullname'] = $row['fullname'];
    
    // Return JSON with success and semester
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'semester' => $semester]);
} else {
    http_response_code(401);
    echo 'Invalid password';
}

$stmt->close();
$conn->close();
?>