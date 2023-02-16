<?php
// session_start();
// include("src/connect.php");

// include("src/functions.php");

function login() {

    echo "<script>console.log('Login starting');</script>";

    $emailAddress = $_POST['email'];
    $password = $_POST['password'];

    // if (!empty($emailAddress) && !empty($password)) {
    //     $query = "SELECT * from users WHERE emailAddress = '$emailAddress' limit 1";
    //     echo "<script>console.log('". $query . "');</script>";
    //     $result = mysqli_query($con, $query);

    //     if ($result) {
    //         if ($result && mysqli_num_rows($result) > 0) {
    //             $user_data = mysqli_fetch_assoc($result);

    //             if ($user_data['password'] === $password) {

    //                 $_SESSION['user_id'] = $user_data['user_id'];
    //                 header("Location: Krisp.html");
    //                 die;
    //             }
    //         }
    //     }
    //     /* error message dapat */
    // } else {
    //     echo "wrong username or password!";
    // }
}

if (isset($_POST['submit'])) {
    echo "<script>console.log('Submit is clicked');</script>";

    login();
}

echo "<script>console.log('Test');</script>";

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
</head>

<body>
    <div class="container">
        <form class="form" id="login" method ="post" action="">
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="Email" name ="email">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" autofocus placeholder="Password" name ="password">
                <div class="form__input-error-message"></div>
            </div>
            <input class="form__button" type="submit" value="Login" name="submit" />
            <p class="form__text">
                <a href="#" class="form__link">Forgot your password?</a>
            </p>
            <p class="form__text">Don't have an account?
                <a href="SignUp.php" class="form__link">Create account</a>
            </p>
        </form>
    </div>
    <script src="src/main.js"></script>
</body>

</html>