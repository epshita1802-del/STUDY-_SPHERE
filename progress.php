<?php
session_start();
include("config/db.php");

/* CHECK LOGIN */
if(!isset($_SESSION['user_id'])){
    echo "<h3>Please login first</h3>";
    exit();
}

$student_id = $_SESSION['user_id'];

/* =========================
   GET STUDENT SEMESTER
========================= */
$sem_query = $conn->query("SELECT semester_id FROM students WHERE id=$student_id");
$sem_row = $sem_query->fetch_assoc();

$semester_id = $sem_row['semester_id'] ?? 0;

/* =========================
   FETCH ONLY THAT SEM SUBJECTS
========================= */
$query = $conn->query("
    SELECT sem.name AS semester_name,
           sub.subject_name
    FROM subjects sub
    JOIN semesters sem ON sub.semester_id = sem.id
    WHERE sub.semester_id = $semester_id
");

/* ORGANIZE DATA */
$data = [];

while($row = $query->fetch_assoc()){
    $data[$row['semester_name']][] = $row['subject_name'];
}

/* =========================
   OVERALL INIT
========================= */
$overall_score = 0;
$overall_total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Progress</title>
    <link rel="stylesheet" href="assets/progress.css">
</head>

<body>

<h1 class="title">📊 Your Progress</h1>

<?php if(empty($data)){ ?>
    <p class="no-data">No subjects found. Please select semester.</p>
<?php } ?>

<?php foreach($data as $semester => $subjects){ ?>

<div class="semester">

    <h2><?php echo $semester; ?></h2>

    <?php foreach($subjects as $sub){

        /* SUBJECT FAKE CALCULATION */
        $total = 0;
        $score = 0;

        for($i = 1; $i <= 6; $i++){   // 6 tests
            $test_total = 5;
            $test_score = rand(2,5);

            $total += $test_total;
            $score += $test_score;
        }

        $percent = ($score/$total)*100;

        /* ADD TO OVERALL */
        $overall_score += $score;
        $overall_total += $total;
    ?>

    <div class="subject">

        <div class="subject-header">
            <span><?php echo $sub; ?></span>
            <span><?php echo $score; ?> / <?php echo $total; ?></span>
        </div>

        <div class="progress-bar">
            <div class="progress" style="width: <?php echo $percent; ?>%">
                <?php echo round($percent); ?>%
            </div>
        </div>

    </div>

    <?php } ?>

</div>

<?php } ?>

<?php
/* =========================
   OVERALL RESULT
========================= */
$overall_percent = ($overall_total > 0)
    ? round(($overall_score/$overall_total)*100,2)
    : 0;
?>

<!-- OVERALL PROGRESS -->
<div class="overall-box">

    <h2>Overall Progress</h2>

    <p><?php echo $overall_score; ?> / <?php echo $overall_total; ?></p>

    <div class="progress-bar">
        <div class="progress" style="width: <?php echo $overall_percent; ?>%">
            <?php echo $overall_percent; ?>%
        </div>
    </div>

</div>

<div class="back">
    <a href="semester.php?id=<?php echo $semester_id; ?>" >⬅ Back</a>
</div>
<script src="javascript.js"></script>

</body>
</html>