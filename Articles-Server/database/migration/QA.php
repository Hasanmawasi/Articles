<?php 
require("../../connection/connection.php");

$sql ="CREATE TABLE IF NOT EXISTS `articles`.`qas` (`id` INT NOT NULL AUTO_INCREMENT , `quetion` TEXT NOT NULL , `answer` TEXT NOT NULL , PRIMARY KEY (`id`));"

?>