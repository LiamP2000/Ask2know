<?php

    include_once('core/autoloader.php');
    $questions = Question::getAll();
    //var_dump($questions);


    //$amountOfComments = Comment::getAmountOfCommentsByQuestionId($questions[0]['questionId']);
    //var_dump($amountOfComments);

    
    $conn = new PDO('mysql:host=localhost;dbname=A2K', "root", "");
    $result = $conn->query("select * from questions");
    //var_dump($result);



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>Home</title>
</head>
<body>

    <?php include_once("nav.inc.php"); ?>

    <div class="wrapper">
    
    <div class="feed-top">
        <input class="search" type="text" placeholder="Search..">
        <a class="btn" href="make_question.php">Make question</a>
    </div>


    <?php foreach($questions as $q): ?>
        <div class="card">
            <div class="name">
                <p><strong>[name]</strong></p>
            </div>
            <div class="date">
                <p><?php echo htmlspecialchars($q['date']); ?></p>
            </div>
            <div class="question">
                <p><?php echo htmlspecialchars($q['question']); ?></p>
            </div>
            <div class="see-more">
            <a href="question.php?questionId=<?php echo $q["id"]; ?>" class="btn">see more</a>
            </div>
            <div class="comments">
                <p>[amount of comments]</p>
            </div>
        </div>
    <?php endforeach; ?>

    

    </div>
    


    

    
</body>
</html>