<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

$student_id = $_SESSION['user_id'];
$semester_id = intval($_GET['id']);

/* SAVE SEMESTER IN DB */
$conn->query("UPDATE students SET semester_id = $semester_id WHERE id = $student_id");

/* REDIRECT TO SEMESTER PAGE */
header("Location: semester.php?id=$semester_id");
exit();
?>