<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Simple connection test
$conn = new mysqli("localhost","root","rokamath100/100","Studysphere");

if ($conn->connect_error) {
    die("DB ERROR: " . $conn->connect_error);
}

echo "✓ Database connected<br>";

// Check if table exists
$tables = $conn->query("SHOW TABLES LIKE 'students'");
if ($tables->num_rows === 0) {
    die("✗ Table 'students' does NOT exist");
}
echo "✓ Table 'students' exists<br>";

// Check row count
$count = $conn->query("SELECT COUNT(*) as cnt FROM students");
$r = $count->fetch_assoc();
echo "✓ Total students in DB: " . $r['cnt'] . "<br>";

if ($r['cnt'] > 0) {
    echo "<h3>Sample Student Records:</h3>";
    $result = $conn->query("SELECT id, email, semester FROM students LIMIT 3");
    while ($row = $result->fetch_assoc()) {
        echo "Email: <strong>" . htmlspecialchars($row['email']) . "</strong> | Semester: " . $row['semester'] . "<br>";
    }
} else {
    echo "⚠ No students in database yet. Please sign up first!<br>";
}

$conn->close();
?>
