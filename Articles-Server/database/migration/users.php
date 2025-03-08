<?php 
require("../../connection/connection.php");

$sql= "CREATE TABLE IF NOT EXISTS `articles`.`users` (`user_id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(80) NOT NULL , `password` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL UNIQUE, PRIMARY KEY (`user_id`));";
if (mysqli_query($mysqli, $sql)) {
    echo "Table created successfully!";
} else {
    echo "Error creating table: " . mysqli_error($mysqli);
}
?>