<?php
include("src/connect.php");
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: SignIn.php");
}

$emailAddress = $_SESSION["email"];
$query = "SELECT * from users WHERE emailAddress = '$emailAddress'";
$conn = OpenConnection();
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];

    if ($retype_password == $password) {

        $encrypted_password = openssl_encrypt($password, "AES-128-CTR",
                "sampleKey", 0, '1234567891011121');
        $query = "UPDATE `users` SET `password` = '$encrypted_password' WHERE `users`.`emailAddress` = '$emailAddress'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("location: profile.php");
        }
    } else {
        $error_message = "Your password does not match!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/profile.css">
    <title>Krisp</title>
</head>

<body>
    <div class="col-md-8">
        <div class="h2 form__title">Edit Profile</div>
        <form method="post" class="form">
            <table class="container table table-striped">
                <tr>
                    <th colspan="2">User Password Details:</th>
                </tr>
                <tr>
                <tr>
                    <th><i class="bi bi-key"></i> Password</th>
                    <td>
                        <input type="password" class="form-control" name="password"
                            placeholder="Password (leave empty to keep old password)" required>
                        <div><small class="js-error js-error-password text-danger">
                            <?php
                        if (isset($error_message)) {
                            echo $error_message;
                        } else echo "";
                    ?></small></div>
                    </td>
                </tr>
                <tr>
                    <th><i class="bi bi-key-fill"></i> Retype Password</th>
                    <td>
                        <input type="password" class="form-control" name="retype_password"
                            placeholder="Retype Password" required>
                    </td>
                </tr>
            </table>
            <div class="p-2">
                <button class="btn btn-primary float-end">Save</button>
                <a href="profile-edit.php">
                    <label type="button" class="btn btn-secondary">Back</label>
                </a>
            </div>

    </div>
    </form>
    </div>
</body>

</html>

<script>
    console.log(URL);
    function display_image(file) {
        var img = document.querySelector(".js-image");
        img.src = URL.createObjectURL(file);
    }

</script>