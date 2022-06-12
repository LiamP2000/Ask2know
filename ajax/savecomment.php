<?php
    include_once(__DIR__ . '/../classes/Comment.php');
    include_once(__DIR__ . '/../core/autoloader.php');
    
    //session_start();
    //$userId = $_SESSION['userId'];

    


        // new comment
        $c = new Comment();
        $c->setQuestionId($_POST['questionId']);
        $c->setText($_POST['text']);
        $c->setUserId(1);
        // save
        if($c->saveComment()) {
            $response = [
                'status' => 'success',
                'body' => htmlspecialchars($c->getText()),
                'message' => 'Comment saved'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'wrong'
            ];
        }

        //succes teruggeven
        

        //header('Content-Type: application/json');
        echo json_encode($response);
    

?>