<?php
session_start();
include("config/db.php");

$score = 0;
$total = 0;

$answers = $_POST['q'];
$test_id = $_POST['test_id'];

// Get all correct answers
foreach($answers as $qid => $user_ans){

    $result = $conn->query("SELECT correct FROM questions WHERE id=$qid");
    $row = $result->fetch_assoc();

    if($user_ans == $row['correct']){
        $score++;
    }

    $total++;
}

// Get student id
$user_name = $_SESSION['user'];
$getUser = $conn->query("SELECT id FROM students WHERE fullname='$user_name'");
$userData = $getUser->fetch_assoc();
$student_id = $userData['id'];

// Save result
$conn->query("INSERT INTO results (student_id, test_id, score)
              VALUES ($student_id, $test_id, $score)");
?>

<h2>Your Score: <?php echo $score; ?> / <?php echo $total; ?></h2>

<?php
if($score >= ($total/2)){
    echo "<h3 style='color:green;'>Pass 🎉</h3>";
} else {
    echo "<h3 style='color:red;'>Fail 😢</h3>";
}
?>

<a href="dashboard.php">Go Back</a>