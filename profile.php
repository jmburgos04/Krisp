<?php
include("src/connect.php");
session_start();

echo "<script>console.log('Debug Objects: " . $_SESSION["email"] . "' );</script>"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="profile.css">
    <title>Edit</title>
</head>

<body>
    <div class="col-md-8">
        <div class="h2 form__title">User Profile</div>
        <table class="container table table-striped">
            <tr>
                <th colspan="2">User Details:</th>
            </tr>
            <tr>
                <th><i class="bi bi-person-square"></i> First Name</th>
                <td>Karl Given</td>
            </tr>
            <tr>
                <th><i class="bi bi-person-square"></i> Last Name</th>
                <td>Reginaldo</td>
            </tr>
            <tr>
                <th><i class="bi bi-phone"></i> Mobile Number</th>
                <td>09202785587</td>
            </tr>
            <tr>
                <th><i class="bi bi-envelope"></i> Email Address</th>
                <td>pikuradezu@gmail.com</td>
            </tr>
        </table>
        <div class="col-md-8 container-button">
            <a href="profile-edit.php">
                <button class="form__button m-1">Edit</button>
            </a>
            <a href="profile-delete.php">
                <button class="form__button m-1">Delete</button>
            </a>
            <a href="SignIn.php">
                <button class="form__button m-1">Logout</button>
            </a>
        </div>

    </div>
    </div>
</body>

</html>