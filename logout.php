<?php
session_start();
session_destroy();
?>

<script>
let confirmLogout = confirm("If you want to logout press OK.");

if(confirmLogout){
    window.location.href = "signup.php"; // or signup.php
} else {
    window.history.back();
}
</script>