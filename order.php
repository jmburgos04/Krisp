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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/8f27d68390.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="shortcut icon" type="x-icon" href="https://raw.githubusercontent.com/llnmmntbln/Web-Dev/main/Icon.png">
  <title>Krisp</title>
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
    text-transform: capitalize;
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

  body {
    width: 100vw;
    font-family: 'Lato', sans-serif;
    background: rgb(213, 213, 213);
  }

  section {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    padding: 8rem 20%;
    background: #e9fdfa;
  }

  section .home-products {
    top: 8vh;
    position: relative;
  }

  .home-products h1 {
    margin-bottom: -10vh;
    font-size: 5rem;
    color: #d46930;
    text-shadow: 5px 5px rgb(7 7 7);
    margin-top: 10vh;
  }

  header {
    position: fixed;
    display: flex;
    justify-content: space-around;
    align-items: center;
    right: 0;
    left: 0;
    background: rgb(247 247 247);
    box-shadow: 0 0 10px rgba(171, 171, 171, 0.8);
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

  section .card-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
  }

  h1 {
    color: #fff;
  }

  .cart-box {
    width: 26% !important;
    position: absolute;
    left: 72%;
    top: 25%;
    /* border:solid 1px blue; */
    padding: 10px 20px;
  }

  h2 {
    font-size: x-large;
    padding: 15px 10px;
    font-family: 'Outfit', sans-serif;
    font-weight: 600;
  }

  .cart-wrapper {
    overflow-y: auto;
    max-height: 350px;
    width: 24vw;
  }

  .subtotal {
    text-align: right;
    padding: 5%;
  }

  .checkout {
    width: 95%;
    text-align: center;
    cursor: pointer;
    background-color: #d46930;
    font-size: large;
    color: #fff;
    margin: 10px auto;
    padding: 10px 15px;
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

  .profile-icon img {
    width: 25px;
    cursor: pointer;
  }

  .cart-item {
    display: grid;
    grid-template-columns: 3fr 6fr 1fr;
    padding: 5% 2%;
    border-bottom: solid 1px lightgray;
  }

  .cart-item img {
    width: 100%;
  }

  .cart-item .details {
    padding-left: 10%;
  }

  .cart-item h3 {
    text-align: left;
    margin-bottom: 5%;
  }

  .cart-item .price {
    display: block;
    text-align: right;
    margin-top: 35%;
  }

  .quantity {
    display: block;
    margin-top: 5%;
  }

  .fa-window-close {
    color: brown;
  }

  .cancel {
    text-align: right;
  }

  .whole-cart-window {
    border: solid lightgray 1px;
    position: fixed;
    top: 7.5vh;
    background-color: #fff;
    margin-right: 1%;
  }

  .hide {
    display: none;
  }

  .non-empty::after {
    content: var(--after-content);
    font-size: 14px;
    width: 20px;
    display: inline-block;
    text-align: center;
    position: relative;
    top: -20px;
    right: 20%;
    background-color: #d46930;
    border-radius: 65%;
  }

  .card-wrapper {
    display: flex;
    flex-wrap: wrap;
  }

  .card-item {
    display: flex;
    padding: 1rem;
    background: rgb(255, 255, 255);
    border: 0.2rem solid rgba(0, 0, 0, .8);
    border-radius: 0.8rem;
    text-align: center;
    flex: 1 1 30rem;
    align-items: center;
  }

  .card-item img {
    width: 45%;
  }

  .card-item .details {
    text-align: center;
    margin: auto;
  }

  .card-item p,
  .card-item h3 {
    margin-top: 10px;
    font-size: 1.4rem;
  }

  .card-item span {
    display: block;
    margin-top: 10px;
  }

  .add-to-cart-btn {
    width: fit-content;
    margin: auto;
    /* margin-top:10px; */
    padding: 10px 15px;
    cursor: pointer;
    background-color: #D46930;
    border-radius: 3px;
    font-size: large;
    color: #fff
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
    text-align: middle;

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

  @media(max-width:991px) {

    .footer-distributed .footer-company-about .logo img {
      width: 100%;
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
      border-left: .5rem solid rgb(215, 144, 13);
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

    .footer-distributed .footer-center i {
      margin-left: 0;
    }
  }


  @media(max-width:768px) {

    .footer-distributed .footer-company-about .logo img {
      width: 50%;
    }

    .card-item span {
      font-size: 1rem;
    }

    .cart-wrapper {
      overflow-y: auto;
      max-height: 423px;
      width: 93vw;
    }

    .whole-cart-window {
      border: solid lightgray 1px;
      left: 10px;
      right: 10px;
      top: 8.5vh;
      background-color: rgb(255, 255, 255);
      margin-right: 1%;

    }

    @media(max-width:440px) {

      .home-products h1 {
        font-size: 4rem;
      }
    }

    .non-empty::after {
      font-size: 13px;
      width: 15px;
      display: inline-block;
      text-align: center;
      position: relative;
      top: -19px;
      right: 15%;
      background-color: #d46930;
      border-radius: 65%;
    }

    header .icon i {
      position: relative;
      font-size: 20px;
      color: black;
      margin: 8px;
      transition: 0.3s;
      right: 2px;
      top: 2px;
    }

    header .logo img {
      width: 90px;
      position: relative;
      left: -80px;
      cursor: pointer;
    }

    .cart-wrapper {
      overflow-y: auto;
      max-height: 423px;
      width: 93vw;
    }
  }

  @media(max-width:400px) {

    .whole-cart-window {
      border: solid lightgray 1px;
      left: 10px;
      right: 10px;
      top: 8.5vh;
      background-color: rgb(255, 255, 255);
      margin-right: 1%;
    }


    .non-empty::after {
      font-size: 13px;
      width: 15px;
      display: inline-block;
      text-align: center;
      position: relative;
      top: -19px;
      right: 15%;
      background-color: #d46930;
      border-radius: 65%;
    }

    .footer-distributed h3 {
      font-size: 7rem;
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
        <a href="logout.php" class="sub-menu-link" onclick="deleteItems()">
          <img src="https://cdn-icons-png.flaticon.com/512/56/56805.png">
          <p>Logout</p>
        </a>

      </div>
    </div>

    <div class="profile-icon">
      <img src="https://static.thenounproject.com/png/638636-200.png" alt="" onclick="toggleMenu()">
    </div>

    <div class="icon">
      <a href="#"></a>
      <div class="cart-icon">
        <i class="fas fa-cart-arrow-down fa-2x"></i>
      </div>
      <div class="cart-box">
        <div class="whole-cart-window hide">
          <h2>Shopping Cart</h2>
          <div class="cart-wrapper">
          </div>
          <div class="subtotal">Subtotal: ₱0.00</div>
          <a id="checkoutbutton" href="ticket.php">
            <div class="checkout" onclick="deleteItems()">Checkout</div>
          </a>
        </div>
      </div>
    </div>

  </header>

  <section class="home-products">
    <h1>Krispyirresistible Products</h1>

  </section>


  <section class="shop-section">
    <div class="card-wrapper">
      <!-- bundle 1-->
      <div data-id="1" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 1";
        $conn = OpenConnection();
        $result = executeQuery($query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 1";
            $conn = OpenConnection();
            $result = executeQuery($query);

            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 1";
              $conn = OpenConnection();
              $result = executeQuery($query);

              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 1";
              $conn = OpenConnection();
              $result = executeQuery($query);

              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>
      <!-- bundle 2 -->
      <div data-id="2" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 2";
        $conn = OpenConnection();
        $result = executeQuery($query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 2";
            $conn = OpenConnection();
            $result = executeQuery($query);

            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 2";
              $conn = OpenConnection();
              $result = executeQuery($query);

              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 2";
              $conn = OpenConnection();
              $result = executeQuery($query);

              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>

      <!-- product 1 -->
      <div data-id="3" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 3";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 3";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 3";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 3";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>

      <!-- product 1 -->
      <div data-id="3" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 4";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 4";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 4";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 4";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>

      <!-- product 2 -->
      <div data-id="4" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 5";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 5";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 5";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 5";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>
      <!-- product 3 -->
      <div data-id="5" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 6";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 6";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 6";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 6";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>

      <!-- product 4 -->
      <div data-id="6" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 7";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 7";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 7";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 7";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>

      <!-- product 5 -->
      <div data-id="7" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 8";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 8";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 8";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 8";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>

      <!-- product 6 -->
      <div data-id="8" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 9";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 9";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 9";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 9";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>

      <!-- product 7 -->

      <div data-id="9" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 10";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 10";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 10";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 10";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
        </div>
      </div>
      <!-- product 8 -->
      <div data-id="9" class="card-item">
        <img src=<?php
        $query = "SELECT * FROM food WHERE id = 11";
        $result = executeQuery($query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '"' . $row['foodImg'] . '"';
        }
        ?> />
        <div class="details">
          <h3>
            <?php
            $query = "SELECT * FROM food WHERE id = 11";
            $result = executeQuery($query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo $row['foodName'];
            }
            ?>
          </h3>
          <p>
            <span>
              <?php
              $query = "SELECT * FROM food WHERE id = 11";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodDescription'];
              }
              ?>
            </span>

            <span class="price">
              <?php
              $query = "SELECT * FROM food WHERE id = 11";
              $result = executeQuery($query);
              while ($row = mysqli_fetch_assoc($result)) {
                echo $row['foodPrice'];
              }
              ?>
            </span>
            <span class="add-to-cart-btn">Add To Cart</span>
          </p>
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
        <a href="about-user.php" class="logo">
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

</body>

<script>
  function deleteItems() {
    localStorage.clear();
  }


  document.querySelector('.add-to-cart-btn').addEventListener('click', showBtn);

  function showBtn(e) {
    document.querySelector('.checkout').style.display = 'block';

    e.preventDefault();
  }


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

  class CartItem {
    constructor(name, desc, img, price) {
      this.name = name
      this.desc = desc
      this.img = img
      this.price = price
      this.quantity = 1
    }
  }

  class LocalCart {
    static key = "cartItems"

    static getLocalCartItems() {
      let cartMap = new Map()
      const cart = localStorage.getItem(LocalCart.key)
      if (cart === null || cart.length === 0) return cartMap
      return new Map(Object.entries(JSON.parse(cart)))
    }

    static addItemToLocalCart(id, item) {
      let cart = LocalCart.getLocalCartItems()
      if (cart.has(id)) {
        let mapItem = cart.get(id)
        mapItem.quantity += 1
        cart.set(id, mapItem)
      }
      else
        cart.set(id, item)
      localStorage.setItem(LocalCart.key, JSON.stringify(Object.fromEntries(cart)))
      updateCartUI()

    }

    static removeItemFromCart(id) {
      let cart = LocalCart.getLocalCartItems()
      if (cart.has(id)) {
        let mapItem = cart.get(id)
        if (mapItem.quantity > 1) {
          mapItem.quantity -= 1
          cart.set(id, mapItem)
        }
        else
          cart.delete(id)
      }
      if (cart.length === 0)
        localStorage.clear()
      else
        localStorage.setItem(LocalCart.key, JSON.stringify(Object.fromEntries(cart)))
      updateCartUI()
    }
  }


  const cartIcon = document.querySelector('.fa-cart-arrow-down')
  const wholeCartWindow = document.querySelector('.whole-cart-window')
  wholeCartWindow.inWindow = 0
  const addToCartBtns = document.querySelectorAll('.add-to-cart-btn')
  addToCartBtns.forEach((btn) => {
    btn.addEventListener('click', addItemFunction)
  })

  function addItemFunction(e) {
    const id = e.target.parentElement.parentElement.parentElement.getAttribute("data-id")
    const img = e.target.parentElement.parentElement.previousElementSibling.src
    const name = e.target.parentElement.previousElementSibling.textContent
    const desc = e.target.parentElement.children[0].textContent
    let price = e.target.parentElement.children[1].textContent
    price = price.replace("₱ ", '')
    const item = new CartItem(name, desc, img, price)
    LocalCart.addItemToLocalCart(id, item)
    console.log(price)
  }


  cartIcon.addEventListener('mouseover', () => {
    if (wholeCartWindow.classList.contains('hide'))
      wholeCartWindow.classList.remove('hide')
  })

  cartIcon.addEventListener('mouseleave', () => {
    if (wholeCartWindow.classList.contains('hide'))

      setTimeout(() => {
        if (wholeCartWindow.inWindow === 0) {
          wholeCartWindow.classList.add('hide')
        }
      }, 500)

  })

  wholeCartWindow.addEventListener('mouseover', () => {
    wholeCartWindow.inWindow = 1
  })

  wholeCartWindow.addEventListener('mouseleave', () => {
    wholeCartWindow.inWindow = 0
    wholeCartWindow.classList.add('hide')
  })


  function updateCartUI() {
    const cartWrapper = document.querySelector('.cart-wrapper')
    cartWrapper.innerHTML = ""
    const items = LocalCart.getLocalCartItems()
    if (items === null) return
    let count = 0
    let total = 0
    for (const [key, value] of items.entries()) {
      const cartItem = document.createElement('div')
      cartItem.classList.add('cart-item')
      let price = value.price * value.quantity
      price = Math.round(price * 100) / 100
      count += 1
      total += price
      total = Math.round(total * 100) / 100
      cartItem.innerHTML =
        `
        <img src="${value.img}"> 
                       <div class="details">
                           <h3>${value.name}</h3>
                           <p>${value.desc}
                            <span class="quantity">Quantity: ${value.quantity}</span>
                               <span class="price">₱ ${price}</span>
                           </p>
                       </div>
                       <div class="cancel"><i class="fas fa-window-close"></i></div>
        `
      cartItem.lastElementChild.addEventListener('click', () => {
        LocalCart.removeItemFromCart(key)
      })
      cartWrapper.append(cartItem)
    }
    var checkoutbutton = document.getElementById('checkoutbutton')

    if (count > 0) {
      cartIcon.classList.add('non-empty')
      let root = document.querySelector(':root')
      root.style.setProperty('--after-content', `"${count}"`)
      const subtotal = document.querySelector('.subtotal')
      subtotal.innerHTML = `SubTotal: ₱ ${total}`
      checkoutbutton.style.display = 'block'
    }
    else {
      cartIcon.classList.remove('non-empty')
      checkoutbutton.style.display = 'none'
    }

  }

  document.addEventListener('DOMContentLoaded', () => { updateCartUI() })




  let subMenu = document.getElementById("subMenu");

  function toggleMenu() {
    subMenu.classList.toggle("open-menu");
  }


</script>

</html>