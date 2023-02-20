<?php
function OpenConnection()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $db = "studydb";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function executeQuery($query)
{
    $conn = $GLOBALS['conn'];
    return mysqli_query($conn, $query);
}

function CloseConnection($conn)
{
    $conn->close();
}
?>