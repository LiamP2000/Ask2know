<?php

    include_once("/autoloader.php");







?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    
    <title>Home</title>
</head>
<body>
<?php include_once(__DIR__ . "/nav.inc.php"); ?>

    <form action="" method="post">
        <div>
            <label for="question">Question</label>
            <input type="text" name="question" id="question">
        </div>

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label for="topics">Add the topics related to the problem</label>
            <select name="topics" id="topics">
                <option value="">Topic 1</option>
                <option value="">Topic 2</option>
                <option value="">Topic 3</option>
        </div>


        <div>
            <input type="submit" name="submit" value="Post question">
        </div>

    </form>
    
    


    

    
</body>
</html>