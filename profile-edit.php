<?php
include("src/connect.php");
session_start();

$emailAddress = $_SESSION["email"];
$query = "SELECT * from users WHERE emailAddress = '$emailAddress'";
$conn = OpenConnection();   
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

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
            <div class="h2 form__title">Edit Profile</div>
            <form method="post" class="form">
                <table class="container table table-striped">
                    <tr>
                        <th colspan="2">User Details:</th>
                    </tr>
                    <tr>
                        <th><i class="bi bi-person-square"></i> First Name</th>
                        <td><input type="text" class="form__input" name="fName" placeholder="<?php echo $row["firstName"] ?>"></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-person-square"></i> Last Name</th>
                        <td><input type="text" class="form__input" name="fName" placeholder="<?php echo $row["lastName"] ?>"></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-phone"></i> Mobile Number</th>
                        <td><input type="tel" class="form__input" name="fName" placeholder="<?php echo $row["mobileNumber"] ?>"></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-envelope"></i> Email Address</th>
                        <td><input type="email" class="form__input" name="fName" placeholder="<?php echo $row["emailAddress"] ?>"
                                disabled></td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-key"></i> Password </th>
                        <td>
                            <input type="password" class="form__input" name="password"
                                placeholder="Password (leave empty to keep old password)">
                            <div><small class="js-error js-error-password text-danger"></small></div>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="bi bi-key-fill"></i> Retype Password</th>
                        <td>
                            <input type="password" class="form__input" name="retype_password"
                                placeholder="Retype Password">
                        </td>
                    </tr>
                </table>
                <div class="p-2">
                    <button class="btn btn-primary float-end">Save</button>
                    <a href="profile.php">
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