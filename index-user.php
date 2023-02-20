<?php
include ("src/connect.php");

session_start();
if(!isset($_SESSION["email"])) {
    header("Location: index-guest.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krisp</title>
    <link rel="shortcut icon" type="x-icon" href="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Orbitron:wght@500&family=Outfit:wght@200;300;500&family=Shadows+Into+Light&display=swap');

    :root {
        --red: #ff3838;
    }

    * {
        font-family: 'Outfit', sans-serif;
        margin: 0%;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
        text-transform: capitalize;
        transition: all .2s linear;
    }

    html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-behavior: smooth;
        scroll-padding-top: 6rem;
    }

    body {
        background: rgb(213, 213, 213);
    }

    section {
        padding: 2rem 9%;
        background: #e9fdfa;
    }

    .heading {
        text-align: start;
        font-size: 3.5rem;
        font-family: 'Orbitron', sans-serif;
        font-weight: 400;
        padding: 1rem;
        color: rgb(0 0 0);
        text-align: center;
    }

    .heading span {
        color: #D46930;
        font-family: 'Orbitron', sans-serif;
        font-size: 1.5em;
        text-shadow: 5px 5px rgb(7 7 7);
    }

    section .home .content .btn {
        left: 10%;
        background-color: #333;
        border: .2rem solid rgb(255, 255, 255);

    }

    .btn {
        display: inline-block;
        padding: 0.8rem 3rem;
        border: 0.2rem solid #f7f7f7;
        color: rgb(58 200 177 / 80%);
        cursor: pointer;
        font-size: 2rem;
        font-family: 'Outfit', sans-serif;
        background: #33383b;
        border-radius: 0.5rem;
        position: relative;
        overflow: hidden;
        z-index: 0;
        margin-top: 1rem;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 0%;
        height: 100%;
        background: rgb(15, 15, 15);
        transition: .3s linear;
        z-index: -1;
    }

    .btn:hover::before {
        width: 100%;
        left: 0;

    }

    .btn:hover {
        color: rgb(228, 228, 228);
    }

    header {
        position: fixed;
        display: flex;
        justify-content: space-around;
        align-items: center;
        right: 0;
        left: 0;
        background: rgb(247 247 247);
        box-shadow: 0 0 10px rgb(171 171 171 / 80%);
        z-index: 1000;
        padding: 1rem 8rem;
    }

    header .icon .sign_btn {
        background: #33383b;
        cursor: pointer;
        padding: 12px 25px;
        margin: 5px;
        display: inline-block;
        border-radius: 25px;
    }

    header .icon .sign_btn a {
        color: rgb(232, 232, 232);
        margin-right: 5px;
        text-decoration: none;
        font-family: 'Outfit', sans-serif;
        font-size: 1.5em;
        transition: 0.3s;
    }

    header .icon .sign_btn a::after {
        content: '';
        width: 0%;
        transition: 0.2s linear;
    }

    header .icon .sign_btn a:hover::after {
        width: 100%;
    }

    header .icon .sign_btn a:hover {
        color: rgb(58 200 177 / 80%);
    }


    header .logo img {
        width: 90px;
        cursor: pointer;
    }

    nav.navbar {
        margin-left: auto;
    }

    header .navbar a {
        display: inline-block;
        margin: 0 15px;
    }

    header .navbar a {
        text-decoration: none;
        color: black;
        font-weight: 500;
        font-size: 17px;
        transition: 0.1s;
    }

    header .navbar a::after {
        content: '';
        width: 0%;
        height: 2px;
        background: rgb(58 200 177 / 80%);
        display: block;
        transition: 0.2s linear;
    }

    header .navbar a:hover::after {
        width: 100%;
    }

    header .navbar a:hover {
        color: rgb(58 200 177 / 80%);
    }

    header .icon i {
        font-size: 20px;
        color: black;
        margin: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    header .icon :hover {
        color: rgb(215, 144, 13);
    }

    #menu-bar {
        font-size: 3rem;
        cursor: pointer;
        color: #666;
        border: .1rem solid #666;
        border-radius: .3rem;
        padding: .5rem 1.5rem;
        display: none;
        right: 13px;
        position: fixed;
    }

    .home {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        min-height: 100vh;
        align-items: center;
        background: url(https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/bgggrouind.png);
        background-attachment: fixed;
        background-size: cover;

    }

    .home .content {
        flex: 1 1 40rem;
        padding-top: 6.5rem;
    }

    .home .image {
        flex: 1 1 40rem;
    }

    .home .image img {
        width: 100%;
        padding: 2rem;
        animation: float 3s linear infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0rem);
        }

        50% {
            transform: translateY(3rem);
        }
    }

    .home .content h3 {
        font-size: 10rem;
        text-shadow: 5px 5px #dbdbdb;
        color: #000000;
        font-family: 'Orbitron', sans-serif;
        text-align: center;
        margin-bottom: -2vh;
    }

    .home .content p {
        font-size: 4rem;
        color: rgba(58, 200, 177, 0.8);
        font-weight: 900;
        text-shadow: 2px 2px #161616;
        font-family: 'Shadows Into Light', sans-serif;
        text-align: end;
    }

    .home .content h4 {
        font-size: 5rem;
        text-shadow: 2px 2px #dbdbdb;
        font-family: 'Outfit', sans-serif;
        color: #000000;
        padding: 1rem 0;
        text-align: center;
        margin-top: -1vh;
    }

    .steps {
        background: #33383b;
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        padding: 1rem 0;
        box-shadow: 0 0 20px rgb(0 0 0 / 90%);
    }

    .steps .box {
        flex: 1 1 25rem;
        padding: 1rem;
        text-align: center;
    }

    .steps .box img {
        border-radius: 50%;
        width: 50%;
        border: 1rem solid rgba(58, 200, 177, 0.8);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
    }

    .steps .box h3 {
        font-size: 2.5rem;
        color: #dbdbdb;
        padding: 1rem 0;
        font-weight: 400;
    }

    .steps .box img:hover {
        transform: translateY(-1.5vh);
        transition: .5s;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        padding: 2em 1em;
        text-align: center;
    }

    .column {
        width: 100%;
        padding: 0.5em 0;
    }

    .about {
        height: 70vh;
        width: 100%;
        background: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url(https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/43fddd.png);
        background-attachment: fixed;
        background-size: cover;
    }

    .about .main img {
        width: 580px;
        max-width: 100%;
        height: auto;
        padding: 0 10px;
        border-radius: 30px;
    }

    .all-text {
        width: 600px;
        max-width: 100%;
        padding: 0 10px;
    }

    .main {
        width: 1290px;
        max-width: 95%;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;
    }

    .all-text h2 {
        font-family: sans-serif;
        font-size: 28px;
        color: #33383b;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .all-text h3 {
        font-size: 65px;
        color: #33383b;
        text-shadow: 5px 5px #D46930;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .all-text p {
        font-family: Outfit, sans-serif;
        font-size: 18px;
        color: rgb(0 0 0);
        line-height: 30px;
        text-shadow: rgb(255 228 212) 2px 2px;
        margin-bottom: 30px;
    }

    .bttn .btn2 {
        background: #f7f7f7;
        color: #33383b;
        padding: 20px 32px;
        font-size: 16px;
        font-weight: 500;
        border: none;
        outline: none;
        box-shadow: 0px 16px 32px 0px rgb(0 0 0 / 9%);
    }

    .bttn .btn2:hover {
        background-color: #33383b;
        color: #f7f7f7;
        transition: .3s;
        cursor: pointer;
    }


    .footer-distributed {
        background: #33383b;
        box-shadow: 0 1px 1px 0 rgb(0 0 0 / 12%);
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        font: bold 16px sans-serif;
        padding: 55px 50px;
    }

    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right {
        display: inline-block;
        vertical-align: top;
    }

    /* Footer left */

    .footer-distributed .footer-left {
        width: 40%;
    }

    /* The company logo */

    .footer-distributed h3 {
        font-size: 9rem;
        text-shadow: 5px 5px rgb(58 200 177 / 80%);
        color: #e7e7e7;
        font-family: 'Orbitron', sans-serif;
        text-align: start;

    }

    .footer-distributed h3 span {
        color: lightseagreen;
    }

    /* Footer links */

    .footer-distributed .footer-links {
        color: #ffffff;
        margin: 20px 0 12px;
        padding: 0;
    }

    .footer-distributed .footer-links a {
        display: inline-block;
        line-height: 1.8;
        font-weight: 400;
        text-decoration: none;
        color: inherit;
    }

    .footer-distributed .footer-company-name {
        color: rgb(247, 247, 247);
        font-size: 14px;
        font-weight: normal;
        margin: 0;
    }

    /* Footer Center */

    .footer-distributed .footer-center {
        width: 35%;
    }

    .footer-distributed .footer-center i {
        background-color: #33383b;
        color: rgb(58 200 177 / 80%);
        font-size: 25px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        text-align: center;
        line-height: 42px;
        margin: 10px 15px;
        vertical-align: middle;
    }

    .footer-distributed .footer-center i.fa-envelope {
        font-size: 17px;
        line-height: 38px;
    }

    .footer-distributed .footer-center p {
        display: inline-block;
        color: #ffffff;
        font-weight: 400;
        vertical-align: middle;
        margin: 0;
    }

    .footer-distributed .footer-center p span {
        display: block;
        font-weight: normal;
        font-size: 14px;
        line-height: 2;
    }

    .footer-distributed .footer-center p a {
        color: white;
        text-decoration: none;
        text-transform: initial;
    }

    .footer-distributed .footer-links a:before {
        content: "|";
        font-weight: 300;
        font-size: 20px;
        left: 0;
        color: rgb(58 200 177 / 80%);
        display: inline-block;
        padding-right: 5px;
    }

    .footer-distributed .footer-links .link-1:before {
        content: none;
    }

    /* Footer Right */

    .footer-distributed .footer-right {
        width: 20%;
    }

    .footer-distributed .footer-company-about {
        line-height: 30px;
        font-weight: normal;
        margin-bottom: -25px;
        text-align: center;
    }

    .footer-distributed .footer-company-about span {
        display: block;
        color: #ffffff;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .footer-distributed .footer-icons {
        text-align: center;
    }

    .footer-distributed .footer-company-about .logo img {
        width: 60%;
        margin-top: -20px;
    }

    .footer-distributed .footer-icons a {
        display: inline-block;
        width: 35px;
        height: 35px;
        cursor: pointer;
        background-color: #33383b;
        border-radius: 2px;
        font-size: 20px;
        color: rgb(58 200 177 / 80%);
        text-align: center;
        line-height: 35px;
        margin-right: 3px;
        margin-bottom: 5px;
    }

    .sub-menu-wrap {
        position: absolute;
        top: 100%;
        right: 10%;
        width: 320px;
        max-height: 0px;
        overflow: hidden;
        transition: max-height 0.5s;
    }

    .sub-menu-wrap.open-menu {
        max-height: 400px;
    }


    .sub-menu {
        background: #fff;
        padding: 20px;
        margin: 10px;
    }

    .sub-menu hr {
        border: 0;
        height: 1px;
        width: 100%;
        background: #d46930;
        margin: 15px 0 10px;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info h3 {
        font-weight: 600;
        font-size: 1.5em;
        text-align: center;
    }

    .user-info img {
        width: 30px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .sub-menu .sub-menu-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: black;
        margin: 12px 0;
        font-size: 1.5rem;
    }

    .sub-menu-link p {
        width: 100%;
    }

    .sub-menu .sub-menu-link img {
        width: 30px;
        background: #f8a77c;
        border-radius: 50%;
        padding: 8px;
        margin-right: 15px;
    }

    .profile-icon img {
        width: 30px;
        cursor: pointer;
    }

    /* Media Queries */

    @media(max-width:991px) {

        html {
            font-size: 50%;
        }

        header {
            padding: 2rem;
        }

        section {
            padding: 2rem;
        }

        .footer-distributed .footer-company-about .logo img {
            width: 100%;
        }

    }

    @media screen and (max-width: 1500px) {

        .about {
            height: 60vh;
        }
    }

    @media screen and (max-width: 1280px) {

        .about {
            height: 110vh;
        }
    }

    @media screen and (max-width: 1360px) {

        .about {
            height: 130vh;
        }
    }

    @media screen and (max-width: 650px) {
        .about {
            height: 100vh;
        }

        .about .main img {
            margin-bottom: 35px;
        }

        .all-text h3 {
            font-size: 45px;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 880px) {

        .footer-distributed {
            font: bold 14px sans-serif;
        }

        .footer-distributed h3 {
            text-align: center;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: block;
            width: 100%;
            margin-bottom: 40px;
            text-align: center;
        }

        .footer-distributed .footer-center i {
            margin-left: 0;
        }
    }


    @media screen and (min-width: 768px) {
        section {
            padding: 1em 7em;
        }
    }

    @media screen and (min-width: 992px) {
        section {
            padding: 5em;
        }

        .card {
            padding: 5em 1em;
            margin-bottom: 3em;
        }

        .column {
            flex: 0 0 33.33%;
            max-width: 33.33%;
            padding: 0 1em;
        }
    }

    @media(max-width:768px) {

        #menu-bar {
            display: initial;
        }

        header .navbar {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: rgb(235, 234, 234);
            border-top: .1rem solid rgba(0, 0, 0, .1);
            clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
        }

        header .navbar.active {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        header .navbar a {
            margin: 1.5rem;
            padding: 1.5rem;
            display: block;
            border: .2rem solid rgba(0, 0, 0, .1);
            border-left: .5rem solid rgb(58 200 177 / 80%);
        }

        .footer-distributed .footer-company-about .logo img {
            width: 50%;
        }
    }

    @media(max-width:550px) {

        .about {
            height: 120vh;
        }

        .home .content h3 {
            font-size: 8rem;
            margin-top: 20vh;
        }

    }


    @media(max-width:400px) {

        html {
            font-size: 50%;
        }

        header {
            padding: 2rem;
        }

        header .icon .sign_btn {
            padding: 10px 20px;
            font-size: 5px;
            border-radius: 20px;
        }
    }

    @media(max-width: 390px) {
        .about {
            height: 130vh;
        }

        .home .content h3 {
            font-size: 8rem;
            margin-top: 20vh;
        }

    }

    @media(max-width: 370px) {
        .about {
            height: 120vh;
        }
    }
</style>

<body>

    <header>

        <a href="index-user.php" class="logo">
            <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Logo.png">
        </a>

        <div id="menu-bar" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="index-user.php">Home</a>
            <a href="about-user.php">About</a>
            <a href="order.php">Order</a>
        </nav>

        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="https://static.thenounproject.com/png/638636-200.png" alt="">
                    <h3><?php echo $row["firstName"] ?></h3>
                </div>
                <hr>

                <a href="profile.php" class="sub-menu-link">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/dc/Settings-icon-symbol-vector.png">
                    <p>Settings</p>
                </a>
                <a href="logout.php" class="sub-menu-link">
                    <img src="https://cdn-icons-png.flaticon.com/512/56/56805.png">
                    <p>Logout</p>
                </a>

            </div>
        </div>

        <div class="profile-icon">
            <img src="https://static.thenounproject.com/png/638636-200.png" alt="" onclick="toggleMenu()">
        </div>

    </header>

    <section class="home" id="Home">
        <div class="content">
            <h3>K R I S P</h3>
            <p>KRISPYIRRESISTIBLE</p>
            <h4>EXPERIENCE.<br>KRISPY.<br>KRUNCH.<br>IN EVERY BITE.<br></h4>
            <a href="order.php" class="btn">Order Now</a>
        </div>

        <div class="image">
            <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/mnnmnmnmmn.png" alt="">
        </div>
    </section>

    <section class="steps">

        <div class="box">
            <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Untitled%20design%20(9).png" alt="">
            <h3>Choose your food</h3>
        </div>
        <div class="box">
            <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Untitled%20design%20(10).png" alt="">
            <h3>Wait for food delivery</h3>
        </div>
        <div class="box">
            <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Untitled%20design%20(11).png" alt="">
            <h3>Easy payments methods</h3>
        </div>
        <div class="box">
            <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Untitled%20design%20(12).png" alt="">
            <h3>Enjoy your meal</h3>
        </div>
    </section>

    <section class="about">
        <div class="main">
            <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/bgggrouid.png" alt="">
            <div class="all-text">
                <h2>About Us</h2>
                <h3>Quick-Service Virtual Restaurant</h3>
                <p>Krisp is a fast-food restaurant in virtual nature that offers a hassle-free ordering system. Standard
                    food is our mission to deliver and making this platform worldwide is our vision. In Krisp, we
                    provide delicious and irresistible quality meals from our hearts to your home.</p>
                <div class="bttn">
                    <a href="about-user.php" class="btn2">Learn More</a>
                </div>
            </div>
        </div>

    </section>

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>KRISP</h3>

            <p class="footer-links">
                <a href="index-user.php" class="link-1">Home</a>

                <a href="about-user.php">About</a>

                <a href="order.php">Order</a>
            </p>

            <p class="footer-company-name">©2023 Ghost Restaurant, BSIT 3-1 (Group 3). All rights reserved.</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>679 San Vicente</span> Sto.Tomas, Batangas</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+63 9202785587</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:krispbusiness@gmail.com">krispbusiness@gmail.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <a href="index-user.php" class="logo">
                    <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/krkazylogo.png">
                </a>
            </p>

            <div class="footer-icons">

                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></i></a>

            </div>

        </div>

    </footer>

    <script>
        let menu = document.querySelector('#menu-bar');
        let navbar = document.querySelector('.navbar');

        menu.onclick = () => {

            menu.classList.toggle('fa-times');
            navbar.classList.toggle('active');

        }

        window.onscroll = () => {

            menu.classList.remove('fa-times');
            navbar.classList.remove('active');

        }

        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }


    </script>

</body>

</html>