<?php
include("../../Utils/header.php");
require "../../connection/connection.php";
require_once "../../Models/Question.php";

$data = json_decode(file_get_contents("php://input"),true);


if($_SERVER["REQUEST_METHOD"] == "GET"){ 
$questions = new Question($mysqli);
  $data = $questions->getQuestions();
 echo json_encode(["questions"=>$data]);
 return;

}

?>