<?php
include("src/connect.php");
function login()
{
    
    echo "<script>console.log('Login success' );</script>";
    $emailAddress = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * from users WHERE emailAddress = '$emailAddress'";
    $conn = OpenConnection();
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) < 1) {
        // put code to display "no user found"//
        echo "<script>console.log('No entry found');</script>";
        return;
    }

    $row = $result->fetch_assoc();
    if ($row['password'] != $password) {
        
        return;
    }

    session_start();
    $_SESSION["email"] = $emailAddress;

    header("location: order.php");

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

    <div class="container">
        <form method="post" action="">
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" name="email" class="form__input" placeholder="Email">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" name="password" class="form__input" placeholder="Password">
                <div class="form__input-error-message"></div>
            </div>
            <input type="submit" value="Submit" name="submit" class="form__button">
            <p class="form__text">
                <a href="#" class="form__link">Forgot your password?</a>
            </p>
            <p class="form__text">Don't have an account?
                <a href="SignUp.php" class="form__link">Create account</a>
            </p>
        </form>
    </div>


</body>

</html>