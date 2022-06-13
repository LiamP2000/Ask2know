<?php

    include_once('core/autoloader.php');
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

    <div class="profile">
        <div class="settings"><a href="settings.php">
            <img class="settings-icon" src="images/settings.svg" alt="settings">
    </a></div>
        <div class="profile-picture">
            <img class="avatar" src="profile-pictures/avatar1.jpg" alt="profile-pic">
        </div>
        <div class="full-name">
            <h1><?php echo User::getUser($_SESSION['user'])["firstname"]; ?>  <?php echo User::getUser($_SESSION['user'])["lastname"]; ?></h1>
        </div>
        <div class="job">
            <img class="briefcase-icon" src="images/briefcase.svg" alt="settings">
            <h4> Technician at Duracell Aarschot</h4>
        </div>
        <div class="questions-asked">
            <h4>Questions asked</h4>
            <p>3</p>
        </div>
        <div class="questions-answered">
            <h4>Questions answered</h4>
            <p>1</p>
        </div>
        <div class="approved-solutions">
            <h4>Approved solutions</h4>
            <p>2</p>
        </div>
        
    </div>
    
    

   
    

    
    
    


    

    
</body>
</html>