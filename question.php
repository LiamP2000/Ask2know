<?php
    include_once('core/autoloader.php');
    $questionId = $_GET['questionId'];
    //var_dump($questionId);
    $question= Question::getQuestionById($questionId);
    //var_dump($question);
    $allComments = Comment::getAllComments($questionId);
    //var_dump($allComments);

    //$amountOfComments = count($allComments);
    //var_dump($amountOfComments);

    


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

    
        <div class="detail-card">
            <div class="name">
                <p><strong>[name]</strong></p>
            </div>
            <div class="date">
                <p><?php echo htmlspecialchars($question['date']); ?></p>
            </div>
            <div class="question">
                <p><?php echo htmlspecialchars($question['question']); ?></p>
            </div>
            <div class="image">
                <img class="detail-image" src="<?php echo htmlspecialchars($question['image']) ?>" alt="">
            </div>
        </div>


        <div class="post__comments">
            <div class="post__comments__form">
                <h5 class="">Comments</h5>
                <input class="" type="text" id="commentText">
                <p href="#" class="btn" id="btnAddComment" data-questionid=<?php echo $questionId ?>>Add comment</p>
            </div>
            <ul class="post__comments__list">
                <?php foreach($allComments as $c):  ?>
                <p><strong>name</strong></p>
                <li><?php echo $c['text'];?></li><br> 
                <?php endforeach; ?>
            </ul>
        </div>
    
    <script src="js/comments.js"></script>
</body>
</html>