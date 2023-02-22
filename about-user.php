<?php
include("src/connect.php");

session_start();
if (!isset($_SESSION["email"])) {
    header("Location: about-guest.php");
}

$emailAddress = $_SESSION["email"];
$query = "SELECT * from users WHERE emailAddress = '$emailAddress'";
$conn = OpenConnection();
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<html>

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


    * {
        font-family: 'Outfit', sans-serif;
        margin: 0%;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
        transition: all .2s linear;
    }

    html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-behavior: smooth;
        scroll-padding-top: 6rem;
    }

    body {
        width: 100%;
        background-color: #c6e2e9;
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

    .heading h1 {
        width: 100%;
        text-align: center;
        font-size: 2.5em;
        color: #33383b;
        margin-top: 15vh;
        text-shadow: 3px 3px #59cbb9;
        font-family: 'Orbitron', sans-serif;
    }

    .heading h1 span {
        color: #D46930;
        font-family: 'Orbitron', sans-serif;
        font-size: 1.5em;
        text-shadow: 5px 5px rgb(7 7 7);
    }

    .heading p {
        font-size: 25px;
        color: black;
        margin-bottom: 50px;
    }

    .about-us {
        width: 1290px;
        max-width: 95%;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        height: 60vh;
        align-items: center;
        justify-content: space-around;
    }

    .about-us img {
        width: 500px;
        max-width: 100%;
        height: 330px;
        padding: 0 10px;
        border-radius: 30px;
    }

    .content {
        padding: 35px 0px;
        width: 580px;
        max-width: 100%;
        height: 350px;
        border-radius: 30px;
    }

    .content h2 {
        font-family: 'Outfit', sans-serif;
        font-size: 2em;
        color: #383838;
        line-height: 33px;
        margin-bottom: 30px;
        font-weight: 400;
    }

    .backstory {
        text-align: center;
        padding: 100px;
    }

    .backstory .heading1 {
        width: 100%;
        text-align: center;
        font-size: 1.0em;
        color: #33383b;
        text-shadow: 3px 3px #59cbb9;
        font-family: 'Orbitron', sans-serif;
    }

    .backstory span {
        color: #D46930;
        font-family: 'Orbitron', sans-serif;
        font-size: 1.3em;
        text-shadow: 5px 5px rgb(7 7 7);
    }

    .backstory-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, auto));
        grid-gap: 0.9px;
        margin-top: 4rem;
    }

    .b-box {
        text-align: center;
        padding: 20px 30px;
        background-color: #1880E0;
    }

    .b-box img {

        width: 180px;
    }

    .b-box h5 {
        margin: 4px 0 10px;
        color: #E78F2E;
        font-size: 1.2rem;
    }

    .b-box p {
        line-height: 1.7;
    }

    .cta {
        padding: 5px;
    }

    .cta img {
        width: 360px;
        height: 250px;
    }

    h1 {
        width: 100%;
        text-align: center;
        font-size: 3.5em;
        color: #33383b;
        text-shadow: 3px 3px #59cbb9;
        font-family: 'Orbitron', sans-serif;
    }

    .card {
        box-shadow: 0 0 0.4em rgb(212 105 48);
        padding: 3.5em 1em;
        border-radius: 0.6em;
        color: rgb(62, 63, 63);
        cursor: pointer;
        transition: 0.3s;
        background-color: #ffffff;
    }

    .card .img-container {
        width: 8em;
        height: 8em;
        background-color: rgb(62, 63, 63);
        padding: 0.5em;
        border-radius: 50%;
        margin: 0 auto 2em auto;
    }

    .card img {
        width: 100%;
        border-radius: 50%;
    }

    .card h3 {
        font-weight: 500;
        font-size: 2em;
        font-family: 'Outfit';
        text-align: center;
    }

    .card p {
        font-weight: 300;
        text-transform: uppercase;
        margin: 0.5em 0px 2em 0;
        letter-spacing: 2px;
        font-size: 1.3em;
        text-align: center;
    }

    .icons {
        width: 50%;
        min-width: 180px;
        margin: auto;
        display: flex;
        justify-content: space-between;
    }

    .card a {
        text-decoration: none;
        color: inherit;
        font-size: 1.4em;
    }

    .card:hover {
        background: #D46930;
        color: #ffffff;
    }

    .card:hover .img-container {
        transform: scale(1.15);
    }

    section.team {
        height: 80vh;
    }

    section h1 span {
        color: #D46930;
        font-family: 'Orbitron', sans-serif;
        font-size: 1.5em;
        text-shadow: 5px 5px rgb(7 7 7);
    }

    section .heading {
        margin-bottom: 3vh;
    }

    .row {
        display: grid;
        grid-template-columns: 320px 320px 320px;
        column-gap: 34px;
        row-gap: 24px;
        align-content: center;
        justify-content: center;
    }

    .row-team {
        margin-bottom: 2rem;
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

    @media only screen and (max-width: 1000px) {
        .about-us img {
            width: auto;
            max-width: 100%;
            height: 330px;
            padding: 0 10px;
            border-radius: 30px;
        }

        .content {
            padding: 45px 20px;
            width: 580px;
            max-width: 100%;
            height: 350px;
            border-radius: 30px;
        }

        .content h2 {
            font-family: Outfit, sans-serif;
            font-size: 16px;
            color: black;
            line-height: 30px;
            margin-bottom: 30px;
        }

        .header-container {
            display: flex;
            flex-direction: column;
            gap: 50px;

            justify-content: center;
            align-items: center;
        }

        .content {
            align-self: center;
            justify-self: center;

        }

        .backstory .heading1 {
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #33383b;
            text-shadow: 3px 3px #59cbb9;
            font-family: 'Orbitron', sans-serif;
        }

        .backstory .heading1 h1 {
            width: 100%;
            text-align: center;
            font-size: 34px;
            color: #33383b;
            text-shadow: 3px 3px #59cbb9;
            font-family: 'Orbitron', sans-serif;
        }

        .backstory .heading1 span {
            color: #D46930;
            font-family: 'Orbitron', sans-serif;
            font-size: 54px;
            text-shadow: 5px 5px rgb(7 7 7);
        }

        .content-img {
            align-self: center;
        }

        .backstory {
            padding: 100px;
        }

        .backstory .heading1 {
            width: 100%;
            text-align: center;
            font-size: 1.0em;
            color: #33383b;
            text-shadow: 3px 3px #59cbb9;
            font-family: 'Orbitron', sans-serif;
        }

        .backstory span {
            color: #D46930;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.3em;
            text-shadow: 5px 5px rgb(7 7 7);
        }


        .backstory-container {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 0.9px;
            margin-top: 4rem;
        }

        .b-box {
            text-align: center;
            padding: 20px 30px;
            background-color: #1880E0;
        }

        .b-box img {
            width: 180px;
        }

        .b-box h5 {
            margin: 4px 0 10px;
            color: #E78F2E;
            font-size: 1.2rem;
        }

        .b-box p {
            line-height: 1.7;
        }

        .cta {
            padding: 5px;
            grid-column: 1 / -1;
        }

        .cta img {
            width: 100vw;
            height: 60%;

        }
    }

    /* CONTENT #2 */
    @media only screen and (max-width: 900px) {
        .backstory .heading1 h1 {
            width: 100%;
            text-align: center;
            font-size: 30px;
            color: #33383b;
            text-shadow: 3px 3px #59cbb9;
            font-family: 'Orbitron', sans-serif;
        }

        .footer-distributed h3 {
            text-align: center;
        }

        section.about-us {
            margin-bottom: 15vh;
        }

        .backstory .heading1 span {
            color: #D46930;
            font-family: 'Orbitron', sans-serif;
            font-size: 40px;
            text-shadow: 5px 5px rgb(7 7 7);
        }

        .content-img {
            align-self: center;
        }

        .backstory {
            padding: 100px;
        }

        .about-us img {
            width: auto;
            max-width: 100%;
            height: auto;
            border-radius: 30px;
        }

        .content {
            padding: 45px 20px;
            width: 580px;
            max-width: 100%;
            height: 350px;
            border-radius: 30px;
        }

        .content h2 {
            font-family: Outfit, sans-serif;
            font-size: 15px;
            color: black;
            line-height: 30px;
            margin-bottom: 30px;
        }

        .header-container {
            display: flex;
            flex-direction: column;
            gap: 50px;

            justify-content: center;
            align-items: center;
        }

        .content {
            align-self: center;
            justify-self: center;

        }

        .content-img {
            align-self: center;
        }

        .backstory {
            padding: 100px;
        }

        .backstory .heading1 {
            width: 100%;
            text-align: center;
            font-size: 1.0em;
            color: #33383b;
            text-shadow: 3px 3px #59cbb9;
            font-family: 'Orbitron', sans-serif;
        }

        .backstory span {
            color: #D46930;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.3em;
            text-shadow: 5px 5px rgb(7 7 7);
        }

        .backstory-container {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 0.9px;
            margin-top: 4rem;
        }

        .b-box {
            text-align: center;
            padding: 20px 30px;
            background-color: #1880E0;
        }

        .b-box img {
            width: 180px;
        }

        .b-box h5 {
            margin: 4px 0 10px;
            color: #E78F2E;
            font-size: 1.2rem;
        }

        .b-box p {
            line-height: 1.7;
        }

        .cta {
            padding: 5px;
            grid-column: 1 / -1;
        }

        .cta img {
            width: 100vw;
            height: 80%;

        }
    }

    @media only screen and (max-width: 375px) {
        .heading h1 {
            text-align: center;
            justify-content: center;
            font-size: 1.3em;
        }

        .about-us img {
            width: auto;
            height: auto;
            margin-top: 20px;
            padding-left: 20px;
            border-radius: 10%;
        }

        section.about-us {
            margin-bottom: 35vh;
        }

        .content h2 {
            text-align: center;
            padding-left: 20px;
        }

        .backstory .heading1 {
            text-align: center;
            justify-content: center;
            font-size: 1.3em;
        }

        .backstory .heading1 span {
            text-align: center;
            justify-content: center;
            font-size: 1.3em;
        }

        .backstory-container {
            justify-content: center;
            align-items: center;
        }

        section.cta {
            width: -500px;
        }

        .row-team h1 {
            text-align: center;
            justify-content: center;
            font-size: 1.5em;
        }
    }

    @media screen and (max-width: 650px) {

        .all-text h3 {
            font-size: 45px;
            margin-bottom: 20px;
        }
    }

    @media(max-width:1135px) {

        section.about-us {
            height: 80vh;
        }

    }

    @media only screen and (max-width: 1100px) {
        .row {
            display: grid;
            grid-template-columns: 320px 320px;
            column-gap: 34px;
            row-gap: 24px;
            align-content: center;
            justify-content: center;
        }

        .card .img-container {
            width: 6.5em;
            height: 6.5em;
            background-color: rgb(62, 63, 63);
            padding: 0.6em;
            border-radius: 50%;
            margin: 0 auto 2em auto;
        }

        section.about-us {
            margin-bottom: 15vh;
        }

        .card img {
            width: 100%;
            border-radius: 50%;
        }

        .card h3 {
            font-weight: 500;
            font-size: 1.8em;
            font-family: 'Outfit';
        }

        .card p {
            font-weight: 300;
            text-transform: uppercase;
            margin: 0.5em 0px 2em 0;
            letter-spacing: 2px;
            font-size: 1.3em;
        }

        .icons {
            width: 50%;
            min-width: 180px;
            margin: auto;
            display: flex;
            justify-content: space-between;
        }

        .card a {
            text-decoration: none;
            color: inherit;
            font-size: 1.2em;
        }
    }

    @media (max-width: 1100px) {
        section.team {
            height: 100vh;
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
    }

    @media(max-width:400px) {
        section.team {
            height: 215vh;
        }

        .footer-distributed h3 {
            font-size: 8rem;
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


    }

    @media only screen and (max-width: 720px) {

        .row {

            display: grid;
            grid-template-columns: 250px 250px;
            column-gap: 34px;
            row-gap: 24px;
            align-content: center;
            justify-content: center;
        }

        .card .img-container {
            width: 5em;
            height: 5em;
            background-color: rgb(62, 63, 63);
            padding: 0.5em;
            border-radius: 50%;
            margin: 0 auto 2em auto;
        }

        .card img {
            width: 100%;
            border-radius: 50%;
        }

        .card h3 {
            font-weight: 500;
            font-size: 1.5em;
            font-family: 'Outfit';
        }

        .card p {
            font-weight: 300;
            text-transform: uppercase;
            margin: 0.5em 0px 2em 0;
            letter-spacing: 2px;
            font-size: 1.3em;
        }

        .icons {
            width: 50%;
            min-width: 180px;
            margin: auto;
            display: flex;
            justify-content: space-between;
        }

        .card a {
            text-decoration: none;
            color: inherit;
            font-size: 1.2em;
        }
    }

    @media only screen and (max-width: 470px) {
        .row {

            display: grid;
            grid-template-columns: 320px;
            column-gap: 34px;
            row-gap: 24px;
            align-content: center;
            justify-content: center;
        }

        .card .img-container {
            width: 7em;
            height: 7em;
            background-color: rgb(62, 63, 63);
            padding: 0.6em;
            border-radius: 50%;
            margin: 0 auto 2em auto;
        }

        section.team {
            height: 215vh;
        }

        .card img {
            width: 100%;
            border-radius: 50%;
        }

        .card h3 {
            font-weight: 500;
            font-size: 1.9em;
            font-family: 'Outfit';
        }

        .card p {
            font-weight: 300;
            text-transform: uppercase;
            margin: 0.5em 0px 2em 0;
            letter-spacing: 2px;
            font-size: 1.4em;
        }

        .icons {
            width: 50%;
            min-width: 180px;
            margin: auto;
            display: flex;
            justify-content: space-between;
        }

        .card a {
            text-decoration: none;
            color: inherit;
            font-size: 1.2em;
        }
    }

    @media(max-width:375px) {

        section.team {
            height: 265vh;
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
                    <h3>
                        <?php echo $row["firstName"] ?>
                    </h3>
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

    <div class="heading">

        <h1>About <span> Us</span></h1>

    </div>

    <section class="about-us">

        <img src="https://github.com/llnmmntbln/Web-Dev/blob/main/1222.jpg?raw=true">

        <div class="content">

            <h2>Krispyirresistible, flavorsome and mouthwatering foods can now be in front of your door in just a few
                clicks! Krist fast food provides delicious and irresistible quality meals from our heart to your
                home.<br><br>
                Partnered with multiple delivery services that can reach you anywhere across and around our area of operation.<br><br></h2>

        </div>

    </section>


    <section class="team">

        <div class="row-team">
            <h1>Our <span> Team</span></h1>
        </div>

        <div class="row">

            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img
                            src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/82193769_1580897525381940_8855497526627794944_n.jpg" />
                    </div>
                    <h3>Allen Montablan</h3>
                    <p id="small-margin-btm">Front-End Developer</p>
                    <div class="icons">
                        <a href="https://twitter.com/llnmntbln">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/llnmntbln/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/allen.montablan.1">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="mailto:montablanallen@gmail.com">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img
                            src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/275659615_5196719550359235_7226429928147335701_n.jpg" />
                    </div>
                    <h3>Vergel Reaño</h3>
                    <p>Graphic Designer</p>
                    <div class="icons">
                        <a href="https://twitter.com/fate_211 ">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/beeejay__/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=100000637231738">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="mailto:reanovj@gmail.com">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/DSC_0097.jpg" />
                    </div>
                    <h3>Glenise Baldeo</h3>
                    <p>Graphic Designer</p>
                    <div class="icons">
                        <a href="https://www.twitter.com/messeeine">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/messeeine">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/messeeine">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="mailto:glenisebaldeo@gmail.com">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img
                            src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/280277996_7290787757662368_3216070773094033267_n.jpg" />
                    </div>
                    <h3>Karl Reginaldo</h3>
                    <p>Full-Stack Developer</p>
                    <div class="icons">
                        <a href="https://twitter.com/GivenStockImage">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/givenreginaldo/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/SansSansYikes">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="mailto:reginaldokarlgiven@gmail.com">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img
                            src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/280178275_5018626324916513_2326693266970732247_n.jpg" />
                    </div>
                    <h3>Matthew Burgos</h3>
                    <p>Back-End Developer</p>
                    <div class="icons">
                        <a href="https://twitter.com/MasterBlade26">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/matthew100401/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/burgos.matthew/">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="mailto:jhonmatthewm@gmail.com">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="img-container">
                        <img
                            src="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/321259108_653144846607799_6331433739601933723_n.jpg" />
                    </div>
                    <h3>Makoy Del Rosario</h3>
                    <p>Documentation Specialist</p>
                    <div class="icons">
                        <a href="https://twitter.com/arjaymakoy">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/arjaymakoy/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/arjaymakoy12?mibextid=ZbWKwL">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="mailto:iarjaydelrosario@gmail.com">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
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