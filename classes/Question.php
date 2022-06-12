<?php 

    class Question{
        private $questionId;
        private $userId;
        private $question;
        private $image;
        private $topic;
        private $date;

        public function getQuestionId(){
            return $this->questionId;
        } 

        public function getUserId(){
            return $this->userId;
        }

        public function getQuestion(){
            return $this->question;
        }

        public function getImage(){
            return $this->image;
        }

        public function getTopic(){
            return $this->topic;
        }

        public function getDate(){
            return $this->date;
        }

        public function setQuestionId($questionId){
            $this->questionId = $questionId;
        }

        public function setUserId($userId){
            $this->userId = $userId;
        }

        public function setQuestion($question){
            $this->question = $question;
        }

        public function setImage($image){
            $this->image = $image;
        }

        public function setTopic($topic){
            $this->topic = $topic;
        }

        public function setDate($date){
            $this->date = $date;
        }

        
        public function save(){
            $conn = Db::getInstance(); 
            $statement = $conn->prepare("insert into questions (userId, question, image, topic) values (:userId, :question, :image, :topic)");
            $statement->bindValue(":userId", $this->userId);
            $statement->bindValue(":question", $this->question);
            $statement->bindValue(":image", $this->image);
            $statement->bindValue(":topic", $this->topic);
            $statement->execute();
        }

        public static function getAll(){
            $conn = Db::getInstance(); 
            $statement = $conn->prepare("select * from questions order by date desc");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            var_dump($result);
        }

        public static function getQuestionById($id){
            $conn = Db::getInstance(); 
            $statement = $conn->prepare("select * from questions where id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

    }