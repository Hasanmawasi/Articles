<?php 

class QuestionSkeleton{
    private $id;
    private $question;
    private $answer;

    public function __construct($question, $answer)
    {
        $this->question = $question;
        $this->answer=$answer;
    }

    public function setQuestion($question){
        $this->question=$question;
    }
    public function getQuestion(){
        return $this->question;
    }
    public function setAnswer($answer){
        $this->answer=$answer;
    }
    public function getAnswer(){
        return $this->answer;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getQuesionsInfo(){
        return [
            "id"=>$this->getId(),
            "question"=>$this->getQuestion(),
            "answer"=>$this->getAnswer()
        ];
    }
}

?>