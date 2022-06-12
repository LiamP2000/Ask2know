<?php

        class Comment{
                private $commentId;
                private $text;
                private $questionId;
                private $userId;

                public function getCommentId() {
                    return $this->commentId;
                }

                public function getText() {
                    return $this->text;
                }

                public function getquestionId() {
                    return $this->questionId;
                }

                public function getUserId() {
                    return $this->userId;
                }

                public function setCommentId($commentId) {
                    $this->commentId = $commentId;
                }

                public function setText($text) {
                    $this->text = $text;
                }

                public function setquestionId($questionId) {
                    $this->questionId = $questionId;
                }

                public function setUserId($userId) {
                    $this->userId = $userId;
                }

                public function saveComment(){
                        $conn = Db::getInstance();
                        $statement = $conn->prepare("insert into comments (text, questionId, userId) values (:text, :questionId, :userId)");
                        $statement->bindValue(":text", $this->text);
                        $statement->bindValue(":questionId", $this->questionId);
                        $statement->bindValue(":userId", $this->userId);
                        return $statement->execute();
                        var_dump($statement);
                }


                public static function getAllComments($questionId){
                        $conn = Db::getInstance();
                        $statement = $conn->prepare("select * from comments where questionId = :questionId");
                        $statement->bindValue(":questionId", $questionId);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        return $result;
                }

                public static function getAmountOfCommentsByQuestionId($questionId){
                        $conn = Db::getInstance();
                        $statement = $conn->prepare("select count(*) from comments where questionId = :questionId");
                        $statement->bindValue(":questionId", $questionId);
                        $statement->execute();
                        $result = $statement->fetch();
                        return $result;
                }
        }