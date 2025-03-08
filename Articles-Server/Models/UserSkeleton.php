<?php
class UserSkeleton{

    private $id;
    private $username;
    private $email;
    private $password;

    function __construct( $username,$email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

    }
    public function setID($id){
        $this->id -> $id;
    }
    public function getID(){
        return $this->id;
    }
    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
            $this->email = $email;
        }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function getUserInfo(){
        return [
            "user_id"=>$this->getID(),
            "username"=>$this->getUsername(),
            "email"=>$this->getPassword()
        ];
    }
}



?>