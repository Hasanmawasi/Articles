<?php

include("../../Utils/header.php");
require "../../connection/connection.php";
require_once "../../Models/User.php";

$data = json_decode(file_get_contents("php://input"),true);

    if(empty($data['email']) || empty($data['password']) || empty($data['username'])){
        return json_encode(["success"=>false,"message"=>"fill all the Blanks !!"]);
    }

    $User = new User($mysqli);
    $createdUser= $User->createUser($data['username'],$data['email'],$data['password']);
    if($createdUser){
        echo json_encode(["success"=>true, "users"=>$createdUser]);
    }

?>