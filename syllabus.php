<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Get subject name
$sub = $conn->query("SELECT * FROM subjects WHERE id=$id");
$subject = $sub->fetch_assoc();

// Get syllabus
$result = $conn->query("SELECT * FROM syllabus WHERE subject_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Syllabus</title>
    <link rel="stylesheet" href="assets/syllabus.css">
</head>

<body>

<!-- NAVBAR -->
<!-- <div class="navbar">
    <div class="logo">STUDY SPHERE</div>

    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
    
    </div>


    <div class="nav-right">
        <span><?php echo $_SESSION['user']; ?></span>
        <a href="logout.php">Logout</a>
    </div>
</div> -->

<!-- SYLLABUS CONTAINER -->
<div class="syllabus-container">

    <h2><?php echo $subject['subject_name']; ?> - Syllabus</h2>

    <ul>
        <?php while($row = $result->fetch_assoc()){ ?>

            <?php 
            // Split syllabus into lines (Unit-wise)
            $lines = explode("\n", $row['content']);

            foreach($lines as $line){
                if(trim($line) != ""){
            ?>
                <li><?php echo $line; ?></li>
            <?php 
                }
            } 
            ?>

        <?php } ?>
    </ul>

    <!-- BACK BUTTON -->
    <a href="subject.php?id=<?php echo $id; ?>">
        <button class="back-btn">Back</button>
    </a>

</div>

</body>
</html>