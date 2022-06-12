<?php
    include_once('core/autoloader.php');

    

    if(isset($_POST['question'])){
        $question = new Question();
        $question->setUserId(1);
        $question->setQuestion($_POST['question']);
        $question->setTopic($_POST['topic']);
        /*$question->setImage($_POST['image']);*/
        if(isset($_FILES['image'])) {
            echo "File is set";
            $currentDirectory = getcwd();
            $uploadDirectory = "/question_pictures/";
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSaveQuality = 80;
            $uploadPath = $currentDirectory . $uploadDirectory . $fileName;
            move_uploaded_file($fileTmpName, $uploadPath);
            $question->setImage("question_pictures/" .$fileName);
        } else {
            echo "File is not set";
            $question->setImage("question_pictures/default.png");
        }
        $question->save();
        header("Location: feed.php");
    }





?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css"> 
    <title>Home</title>
</head>
<body>
<?php include_once(__DIR__ . "/nav.inc.php"); ?>

<div class="ask-question">
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label class="issue" for="question">What's the issue?</label><br>
            <textarea name="question" id="question"  rows="4" cols="50"></textarea>
        </div>

        <div>
            <label class="image" for="image">Add a picture to visualize the problem</label><br>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label class="topic" for="topic">Add the topics related to the problem</label><br>
            <input type="text" name="topic" id="topic">
        </div>


        <div>
            <input class="btn" type="submit" name="submit" value="Post question">
        </div>

    </form>
</div>    
    


    

    
</body>
</html>