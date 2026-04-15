<?php
session_start();
session_destroy();
header("Location: /Studysphere/login.html");
exit;
?>
