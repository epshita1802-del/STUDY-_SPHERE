<?php
include("config/db.php");

$test_id = intval($_GET['id']);

/* FETCH QUESTIONS */
$question_query = $conn->query("SELECT * FROM questions WHERE test_id=$test_id");

/* RESULT VARIABLES */
$score = null;
$total = 0;

/* WHEN FORM SUBMITTED */
if($_SERVER["REQUEST_METHOD"] == "POST") {

   $answers = $_POST['q'] ?? [];
   if(empty($answers)){
    echo "<p style='color:red;text-align:center;'>⚠ Please select at least one answer</p>";
}

    $check = $conn->query("SELECT * FROM questions WHERE test_id=$test_id");

    $score = 0;
    $total = 0;

    while($row = $check->fetch_assoc()) {

        $qid = $row['id'];
        $total++;

        if(isset($answers[$qid]) && $answers[$qid] == $row['correct']) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/syllabus.css">
</head>

<body>

<!-- TEST FORM -->
<form method="POST">

<?php while($row = $question_query->fetch_assoc()){ ?>


<div class="question-box">
    <p><?php echo $row['question']; ?></p>

    <label>
        <input type="radio" name="q[<?php echo $row['id']; ?>]" value="opt1">
        <?php echo $row['opt1']; ?>
    </label><br>

    <label>
        <input type="radio" name="q[<?php echo $row['id']; ?>]" value="opt2">
        <?php echo $row['opt2']; ?>
    </label><br>

    <label>
        <input type="radio" name="q[<?php echo $row['id']; ?>]" value="opt3">
        <?php echo $row['opt3']; ?>
    </label><br>

    <label>
        <input type="radio" name="q[<?php echo $row['id']; ?>]" value="opt4">
        <?php echo $row['opt4']; ?>
    </label><br>
</div>

<?php } ?>

<input type="hidden" name="test_id" value="<?php echo $test_id; ?>">

<button type="submit">Submit Test</button>

</form>

<!-- RESULT SECTION -->
<?php if($score !== null){ ?>
    <div style="text-align:center; margin-top:30px; padding:20px;">

        <h2>Result</h2>

        <p style="font-size:22px;">
            You scored <b><?php echo $score; ?></b> / <?php echo $total; ?>
        </p>

        <?php
        if($score == $total){
            echo "<p>🏆 Excellent! Full Score</p>";
        } elseif($score >= $total/2){
            echo "<p>👍 Good Job</p>";
        } else {
            echo "<p>📚 Need Improvement</p>";
        }
        ?>
        <?php if($score !== null){ ?>
    <!-- result box -->
<?php } ?>


<!-- BACK BUTTON -->
<div id="back-btn-wrapper">
    <a href="subject.php?id=<?php echo $test_id; ?>">
        <button type="button" id="back-btn">
            ⬅ Back to Subject
        </button>
    </a>
</div>

    </div>
<?php } ?>


<script src="javascript.js"></script>

</body>
</html>