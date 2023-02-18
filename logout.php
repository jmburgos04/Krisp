<?php 
include("src/connect.php");


session_destroy();
unset($_SESSION['email']);

header("location: profile.php");
?>