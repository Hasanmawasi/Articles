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
$checkseed = $mysqli->query("SELECT COUNT(*) as total FROM qas");
$row = $checkseed->fetch_assoc();
if($row['total'] == 0){
    require_once __DIR__ . "../../database/seed/questions.php";
}


?>