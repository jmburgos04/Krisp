<?php
session_start();
if(!isset($_SESSION["email"])) {
    header("Location: SignIn.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krisp</title>
    <link rel="shortcut icon" type="x-icon" href="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Orbitron:wght@500&family=Outfit:wght@200;300;500&family=Shadows+Into+Light&display=swap');

    *,
    *::after {
        font-family: 'Outfit', sans-serif;
        margin: 0%;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
        transition: all .2s linear;
    }

    :root {
        --after-content: '2';
    }

    html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-behavior: smooth;
        scroll-padding-top: 6rem;
    }

    section {
        height: 39vh;
    }

    body {
        background: url(https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/43fddd.png);
    }

    .ticket {
        background-color: rgb(58 200 177 / 80%);
        width: 35%;
        margin: auto;
        margin-top: 200px;
        padding: 40px;
        border-radius: 30px;
    }

    .order-number {
        font-size: 20px;
        font-family: 'Open Sans', sans-serif;
    }

    .main {
        font-size: 25px;
        font-family: 'Outfit', sans-serif;
        text-align: center;
    }

    .btn {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile-icon img {
        width: 28px;
        cursor: pointer;
    }

    .btn2 {
        background-color: rgb(255 255 255 / 80%);
        cursor: pointer;
        padding: 10px;
        border-radius: 10px;
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn2:hover {
        background-color: rgb(33 150 243);
        color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .check {
        display: flex;
        justify-content: center;
    }

    .check img {
        position: relative;
        width: 50px;
        top: -65px;
    }

    header {
        position: fixed;
        display: flex;
        justify-content: space-around;
        align-items: center;
        right: 0;
        left: 0;
        top: 0;
        background: rgb(247 247 247);
        box-shadow: 0 0 10px rgb(171 171 171 / 80%);
        z-index: 1000;
        padding: 1rem 8rem;
    }

    header .icon {
        display: flex;
        align-items: center;
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
        font-size: 18px;
        color: black;
        margin: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .navbar img {
        width: 23px;
        align-items: center;
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

    .footer-distributed {
        position: relative;
        background: #33383b;
        box-shadow: 0 1px 1px 0 rgb(0 0 0 / 12%);
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        top: 55px;
        font: bold 16px sans-serif;
        padding: 60px 50px;
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
        font-size: 10rem;
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

        .profile-icon img {
            display: none;
        }
    }

    @media (max-width: 880px) {

        .footer-distributed {
            font: bold 14px sans-serif;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: block;
            width: 100%;
            margin-bottom: 40px;
            text-align: center;
        }

        .ticket {
            width: 90%;
        }
    }

    @media(max-width:400px) {

        .footer-distributed h3 {
            font-size: 8rem;
        }

        section {
            height: 55vh;
        }
    }

    @media only screen and (max-width: 900px) {

        .footer-distributed h3 {
            text-align: center;
            font-size: 5em;
        }
    }

    @media only screen and (max-width: 290px){
        .footer-distributed h3 {
            text-align: center;
            font-size: 4em;
        }
    }
</style>

<header>

    <a href="index-user.php" class="logo">
        <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Logo.png">
    </a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="index-user.php">Home</a>
        <a href="about-user.php">About</a>
        <a href="order.php">Order</a>

        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="https://static.thenounproject.com/png/638636-200.png" alt="">
                    <h3>Customer Name</h3>
                </div>
                <hr>

                <a href="profile.php" class="sub-menu-link">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/d/dc/Settings-icon-symbol-vector.png">
                    <p>Settings</p>
                </a>
                <a href="index-user.php" class="sub-menu-link">
                    <img src="https://cdn-icons-png.flaticon.com/512/56/56805.png">
                    <p>Logout</p>
                </a>

            </div>
        </div>

    </nav>
    <div class="profile-icon">
        <img src="https://static.thenounproject.com/png/638636-200.png" alt="" onclick="toggleMenu()">
    </div>

</header>


<body>

    <section>
        <div class="ticket">
            <div class="check">
                <img src="https://i.ibb.co/DKKL6d3/check.png">
            </div>

            <p class="order-number" id="ticketNum"><b>Order No: </b></p>
            <br>
            <hr>

            <p class="main">Thank you for ordering in KRISP</p>

            <br>

            <hr>

            <br>

            <div class="btn">
                <a href="order.php"><button class="btn2">Order Again</button></a>
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

        let x = Math.floor(Math.random() * (999999 - 100000) + 999999);
        document.getElementById("ticketNum").innerHTML = "Order No:" + x;

        let y = Math.floor(Math.random() * (1000 - 800) + 100)
        document.getElementById("toTal").innerHTML = "Total:" + y;



    </script>

</body>

</html>