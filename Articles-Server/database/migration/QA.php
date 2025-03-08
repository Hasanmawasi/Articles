<?php 
require("../../connection/connection.php");

$sql ="CREATE TABLE IF NOT EXISTS `articles`.`qas` (`id` INT NOT NULL AUTO_INCREMENT , `quetion` TEXT NOT NULL , `answer` TEXT NOT NULL , PRIMARY KEY (`id`));";

if (mysqli_query($mysqli, $sql)) {
    echo "Table created successfully!";
} else {
    echo "Error creating table: " . mysqli_error($mysqli);
}
?>