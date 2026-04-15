<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost","root","rokamath100/100","Studysphere");

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

echo "<h3>Table Structure:</h3>";
$result = $conn->query("DESCRIBE students");
if ($result) {
    while($row = $result->fetch_assoc()) {
        echo $row['Field'] . " - " . $row['Type'] . "<br>";
    }
}

echo "<h3>All Students:</h3>";
$result = $conn->query("SELECT id, email, semester FROM students");
if ($result) {
    echo "Count: " . $result->num_rows . "<br>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " | Email: " . $row['email'] . " | Semester: " . $row['semester'] . "<br>";
    }
} else {
    echo "Query Error: " . $conn->error;
}

$conn->close();
?>
