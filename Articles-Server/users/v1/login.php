<?php 
include("../../Utils/header.php");
require "../../connection/connection.php";
require_once "../../Models/User.php";

$data = json_decode(file_get_contents("php://input"),true);

    if(empty($data['email']) || empty($data['password'])){
        echo json_encode(["success"=>false,"message"=>"fill all the Blanks !!"]);
        return;
    }
    $User = new User($mysqli);
    if($User->loginUser($data['email'],$data['password'])){
        return json_encode(["success"=>true,"message"=>"user logedin"]);
    }


?>