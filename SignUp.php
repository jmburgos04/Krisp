<?php
    session_start();
    
        if (isset($error_message)) {
            unset($error_message);
        }
        include("src/connect.php");
        include("src/functions.php");

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {   
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $mobileNumber = $_POST['mobileNumber'];
            $emailAddress = $_POST['emailAddress'];
            $password = $_POST['password'];

            if(!empty($firstName) && !empty($lastName) && !empty($mobileNumber) && ($emailAddress) && !empty($password))
            {   
                $user_id = random_num(20);
                $encrypted_password = openssl_encrypt($password, "AES-128-CTR",
                "sampleKey", 0, '1234567891011121');
                $query = "INSERT into users (user_id, firstName, lastName, mobileNumber, emailAddress, password) VALUES ('$user_id', '$firstName', '$lastName', '$mobileNumber', '$emailAddress', '$encrypted_password')";
                $conn = OpenConnection();
                try {
                    $result = mysqli_query($conn, $query);
                    header("Location: SignIn.php");
                } catch(Exception $e) {
                    $error_message = "Email is taken";
                }
                
            } else {
                header("Location: SignUp.php?error=invalid");
            }
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
</head>

<body>
    <div class="container">
        <form action="" method="post" class="form" id="createAccount">
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" id="signupUsername" name="firstName" class="form__input" autofocus placeholder="First Name">
                <div class="form__input-error-message">
                </div>
            </div>
            <div class="form__input-group">
                <input type="text" id="signupUsername" name="lastName" class="form__input" autofocus placeholder="Last Name">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="tel" id="signupNumber" name="mobileNumber" class="form__input" pattern="[0-9]{11}" autofocus placeholder="Mobile Number">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="email" id="signupEmail" name="emailAddress" class="form__input" autofocus placeholder="Email Address">
                <div class="form__input-error-message">
                <?php
                        if (isset($error_message)) {
                            echo $error_message;
                        } else echo "";
                    ?>
                </div>
            </div>
            <div class="form__input-group">
                <input type="password" name="password" class="form__input" autofocus placeholder="Password">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit" value="register">Continue</button>
            <p class="form__text">Already have an account?
                <a class="form__link" href="SignIn.php" id="linkLogin">Sign In</a>
            </p>
        </form>
    </div>
    <script src="src/main.js"></script>
</body>

</html>