<?php 
require_once 'QuestionSkeleton.php';
class Question extends QuestionSkeleton{
    private $db;

    public function __construct($db)
    {
        $this->db=$db;
    }

    public function createQuestion($question,$answer){
        parent::__construct($question,$answer);
        $Ques = $this->getQuestion();
        $Ans = $this -> getAnswer();
        $sql = "INSERT INTO qas(quetion,answer) VALUES(?,?);";
        $stmt= $this->db->prepare($sql);
        $stmt->bind_param("ss",$Ques, $Ans);
        if($stmt->execute()){
             return $this->db->insert_id;
            
        }
    }

}

?>