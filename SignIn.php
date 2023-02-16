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
        return;
    }

    header("location: index.php");

}

if (isset($_POST['submit'])) {
    login();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <title>login</title>
    <script src="src/main.js"></script>
</head>

<body>
    
<form method="post" action="">
    <input type="text" name="email">
    <input type="text" name="password">
    <input type="submit" value="Submit" name="submit"> 
</form>
    
    
</body>

</html>