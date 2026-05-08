<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

$subject_id = $_GET['id'];

// Get subject name
$sub = $conn->query("SELECT * FROM subjects WHERE id=$subject_id");
$subject = $sub->fetch_assoc();

$semester_id = $subject['semester_id'] ?? 0;

// Get syllabus
$syllabus = $conn->query("SELECT * FROM syllabus WHERE subject_id=$subject_id");

// Get tests
$tests = $conn->query("SELECT * FROM tests WHERE subject_id=$subject_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subject</title>
    <link rel="stylesheet" href="assets/syllabus.css">
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">STUDY SPHERE</div>

    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="semester.php?id=<?php echo $semester_id; ?>" >Subjects</a>
    
    </div>

    <div class="nav-right">
        <span><?php echo $_SESSION['user']; ?></span>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- SUBJECT HEADER -->
<div class="subject-header">
    <h1><?php echo $subject['subject_name']; ?></h1>

    <div class="tabs">
        <button id="tab1" class="active" onclick="showTab('syllabus')">Syllabus</button>
        <button id="tab2" onclick="showTab('tests')">Tests</button>
    </div>
</div>

<!-- CONTENT -->
<div class="content-box">

    <!-- SYLLABUS -->
    <div id="syllabus" class="tab-content">
        <div class="syllabus-container">
            <h2>Syllabus</h2>

            <ul>
            <?php while($row = $syllabus->fetch_assoc()){ ?>
                <li><?php echo nl2br($row['content']); ?></li>
            <?php } ?>
            </ul>

        </div>
    </div>

    <!-- TESTS -->
    <div id="tests" class="tab-content" style="display:none;">
        <div class="test-container">
            <h2>Tests</h2>

            <?php while($row = $tests->fetch_assoc()){ ?>
                <div class="test-card">
                    <p>Test <?php echo $row['test_number']; ?></p>

                    <a href="test.php?id=<?php echo $row['id']; ?>">
                        <button>Start Test</button>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>

</div>

<script>
function showTab(tab){
    document.getElementById('syllabus').style.display = 'none';
    document.getElementById('tests').style.display = 'none';

    document.getElementById(tab).style.display = 'block';

    // active button highlight
    document.getElementById('tab1').classList.remove('active');
    document.getElementById('tab2').classList.remove('active');

    if(tab === 'syllabus'){
        document.getElementById('tab1').classList.add('active');
    } else {
        document.getElementById('tab2').classList.add('active');
    }
}
</script>

</body>
</html>