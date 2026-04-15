<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost","root","rokamath100/100","Studysphere");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo 'Method not allowed';
	exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$semester = trim($_POST['semester'] ?? '');

if ($fullname === '' || $email === '' || $password === '' || $semester === '') {
	http_response_code(400);
	echo 'Missing required fields';
	exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	http_response_code(400);
	echo 'Invalid email';
	exit;
}

if (strlen($password) < 6) {
	http_response_code(400);
	echo 'Password too short';
	exit;
}

// Check if email already exists
$check = $conn->prepare("SELECT id FROM students WHERE email = ?");
if ($check) {
	$check->bind_param('s', $email);
	$check->execute();
	$check->store_result();
	if ($check->num_rows > 0) {
		http_response_code(409);
		echo 'Email already registered';
		$check->close();
		$conn->close();
		exit;
	}
	$check->close();
} else {
	http_response_code(500);
	echo $conn->error;
	$conn->close();
	exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO students (fullname, email, password, semester) VALUES (?, ?, ?, ?)");
if (!$stmt) {
	http_response_code(500);
	echo $conn->error;
	$conn->close();
	exit;
}

$stmt->bind_param('ssss', $fullname, $email, $hash, $semester);
if ($stmt->execute()) {
	// Get the inserted user ID
	$user_id = $stmt->insert_id;
	
	// Auto-login: Store user info in session
	$_SESSION['user_id'] = $user_id;
	$_SESSION['email'] = $email;
	$_SESSION['fullname'] = $fullname;
	$_SESSION['semester'] = $semester;
	
	// Return JSON with success and semester
	header('Content-Type: application/json');
	echo json_encode(['success' => true, 'semester' => $semester]);
} else {
	http_response_code(500);
	echo $stmt->error;
}

$stmt->close();
$conn->close();
?>