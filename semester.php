<?php
session_start();
include("config/db.php");

$semester_id = $_GET['id'];

$result = $conn->query("SELECT * FROM subjects WHERE semester_id=$semester_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subjects</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">STUDY SPHERE</div>
    

    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="progress.php">📊 Progress</a>
    </div>

    <div class="nav-right">
        <span><?php echo $_SESSION['user']; ?></span>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="main">

    <h1>Subjects</h1>

    <div class="card-container">

        <?php
        // IMAGE MAPPING (NO DATABASE CHANGE NEEDED)
        $images = [
            1 => "c.png",
            2 => "cpp.png",
            3 => "dsog.jpg",
            4 => "cn1.png",
            5 => "math.jpg",
            6 => "web.jpg",
            7 => "rdbms.jpg",
            8 => "os.jpg",
            9 => "dmath.png"
        ];

        while($row = $result->fetch_assoc()) {

            $img = $images[$row['id']] ?? "default.jpg";
        ?>

        <div class="card" style="background-image: url('uploads/<?php echo $img; ?>');">

            <div class="overlay">
                <a href="subject.php?id=<?php echo $row['id']; ?>">
                    <button>Open</button>
                </a>
            </div>
            

        </div>

        <?php } ?>

    </div>
</div>

</body>
</html>