<?php
include("src/connect.php");
function login()
{

    echo "<script>console.log('Login success' );</script>";
    $emailAddress = $_POST['email'];
    $password = $_POST['password'];
    echo "<script>console.log('" . $emailAddress . "');</script>";
    echo "<script>console.log('" . $password . "');</script>";
    $query = "SELECT * from users WHERE emailAddress = '$emailAddress' limit 1";
    $conn = OpenConnection();
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
    echo "<script>console.log('". $row['user_id'] . "');</script>";
    echo "<script>console.log('". $row['firstName'] . "');</script>";
    echo "<script>console.log('". $row['lastName'] . "');</script>";
    echo "<script>console.log('". $row['emailAddress'] . "');</script>";
    echo "<script>console.log('". $row['mobileNumber'] . "');</script>";
    echo "<script>console.log('". $row['password'] . "');</script>";
}

if (isset($_POST['submit'])) {
    login();
}
?>