<?php 
include("../../Utils/header.php");
require "../../connection/connection.php";
require_once "../../Models/Question.php";

$data = json_decode(file_get_contents("php://input"),true);

    if(empty($data['question']) || empty($data['answer'])){
        echo json_encode(["success"=>false,"message"=>"fill all the Blanks !!"]);
        return;
    }

    $Question = new Question($mysqli);
    if($Question->createQuestion($data['question'],$data['answer'])){
        echo json_encode(["success"=> true,"message"=>"Q & A added successfully!"]);
        return;
    }
    echo json_encode(["success"=> false,"message"=>"Q & A failed to  added"]);



?>