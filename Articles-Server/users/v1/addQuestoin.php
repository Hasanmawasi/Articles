<?php 
include("../../Utils/header.php");
require "../../connection/connection.php";
require_once "../../Models/Question.php";

$data = json_decode(file_get_contents("php://input"),true);

    if(empty($data['question']) || empty($data['answer'])){
        return json_encode(["success"=>false,"message"=>"fill all the Blanks !!"]);
    }

    $Question = new Question($mysqli);
    $Question->createQuestion($data['question'],$data['answer']);



?>