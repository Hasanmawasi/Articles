<?php 
require_once 'UserSkeleton.php';

class User extends UserSkeleton{
    private $db;

    public function __construct($db)
    {
        // parent::__construct($username,$email,$password);
        $this->db = $db;
    }
    
    public function createUser($username,$email,$password){
        parent::__construct($username,$email,$password);
        $sql="INSERT INTO users(username,email,password) VALUES(?,?,?)";
        // $username = $this->getUsername();
        // $email=$this->getEmail();
        // $password=$this->getPassword();
        $hashed_password = hash($password,MHASH_SHA256);
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss",$username,$email,$hashed_password);
        if($stmt->execute()){
            return $this->getUserInfo();
        }
    }

    public function loginUser($email,$enteredPassword){
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s",$email);
        if($stmt->execute()){
            $result= $stmt->get_result();
            if($result-> num_rows >0){
                $row =$result->fetch_assoc();
                if($this->verifyPassword($enteredPassword,$row["password"])){
                   echo json_encode(["success"=>true,"message"=>"user loged"]);
                    return;
                }
                echo json_encode(["success"=>false,"message"=>"wrong password"]);
            }
            echo json_encode(["success"=>false,"message"=>"email not found"]);
            return;
        }
    }
    public function verifyPassword($enteredPassword, $storedPassword){
        if(password_verify($enteredPassword,$storedPassword)){
            return true;
        }
        return false;
    }
}


?>