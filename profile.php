<?php
include("src/connect.php");
session_start();

if (!isset($_SESSION["email"])) {
    header("location: SignIn.php");
}

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
        <div class="h2 form__title">User Profile</div>
        <table class="container table table-striped">
            <tr>
                <th colspan="2">User Details:</th>
            </tr>
            <tr>
                <th><i class="bi bi-person-square"></i> First Name</th>
                <td>
                    <?php echo $row["firstName"] ?>
                </td>
            </tr>
            <tr>
                <th><i class="bi bi-person-square"></i> Last Name</th>
                <td>
                    <?php echo $row["lastName"] ?>
                </td>
            </tr>
            <tr>
                <th><i class="bi bi-phone"></i> Mobile Number</th>
                <td>
                    <?php echo $row["mobileNumber"] ?>
                </td>
            </tr>
            <tr>
                <th><i class="bi bi-envelope"></i> Email Address</th>
                <td>
                    <?php echo $row["emailAddress"] ?>
                </td>
            </tr>
        </table>
        <div class="p-2">
            <a href="profile-delete.php">
                <button class="btn btn-danger float-end">Delete</button>
            </a>
            <a href="order.php">
                <label type="button" class="btn btn-secondary">Back</label>
            </a>
            <a href="profile-edit.php">
                <label type="button" class="btn btn-primary">Edit</label>
            </a>
        </div>

    </div>
    </div>
</body>

</html>