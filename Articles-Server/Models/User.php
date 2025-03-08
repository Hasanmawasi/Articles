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
        if($this->findUser($email)){
            echo json_encode(["success"=>false,"message"=>"User is already exist!"]);
            return;
        }
        $sql="INSERT INTO users(username,email,password) VALUES(?,?,?);";
        $hashed_password = hash('sha256',$password);
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss",$username,$email,$hashed_password);
        if($stmt->execute()){
            $sqlID = "select user_id from users where email = ?;";
            $stmtID=$this->db->prepare($sqlID);
            $stmtID->bind_param("s",$email);
            if($stmtID-> execute()){
                $result = $stmtID->get_result();
                $row = $result->fetch_assoc();
                $this->setID($row['user_id']);
            }
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
        $hash_password = hash('sha256',$enteredPassword);
        if($hash_password == $storedPassword){
            return true;
        }
        return false;
    }
    public function findUser($email){
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s",$email);
        if($stmt->execute()){
            $result= $stmt->get_result();
            if($result-> num_rows >0){
                return true;
            }
            return false;
        }
    }
}


?>