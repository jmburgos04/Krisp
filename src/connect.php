<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "studydb";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) 
{
    die("faled to connect :(");
}
?>