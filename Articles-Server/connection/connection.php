<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "articles";


$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "connection success!";
?>