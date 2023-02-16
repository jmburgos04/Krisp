<?php
include("src/connect.php");
function login()
{

    echo "<script>console.log('Login success' );</script>";
    $emailAddress = $_POST['email'];
    $password = $_POST['password'];
    echo "<script>console.log('" . $emailAddress . "');</script>";
    echo "<script>console.log('" . $password . "');</script>";
    $query = "SELECT * from users WHERE emailAddress = '$emailAddress'";
    $conn = OpenConnection();
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 1) {
        echo "<script>console.log('Duplicate entry found');</script>";
    }

    if (mysqli_num_rows($result) < 1) {
        echo "<script>console.log('No entry found');</script>";
    }

    $row = $result->fetch_assoc();
    if ($row['password'] != $password) {
        echo "<script>console.log('Wrong password');</script>";
    }


}

if (isset($_POST['submit'])) {
    login();
}
?>