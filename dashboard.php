<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM semesters");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">STUDY SPHERE</div>

    <div class="nav-right">
        <span>Welcome <?php echo $_SESSION['user']; ?></span>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="main">

    <h1>Welcome to Study Sphere Dashboard</h1>
    <p>Your smart study companion</p>

    <div class="card-container">

        <?php
        // SEMESTER IMAGE MAP (ONLY 2 SEMESTERS)
        $images = [
            1 => "sem3.png",
            2 => "sem4.png"
        ];

        while($row = $result->fetch_assoc()) {

            $img = $images[$row['id']] ?? "default.png";
        ?>

        <div class="card"
             style="background-image: url('uploads/<?php echo $img; ?>');">

            <div class="overlay">
            
                

                <a href="set_semester.php?id=<?php echo $row['id']; ?>">
                    <button>Explore</button>
                </a>
            </div>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>