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
             return true;            
        }
        return false;
    }
    public function getQuestions(){
        $sql="SELECT * FROM qas;";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows >0){
                $data=[];
                while($row=$result->fetch_assoc()){
                    array_push($data,$row);
                }
                return $data ;
            }
        }
    }

}

?>