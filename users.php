<?php
include_once(__DIR__ . "/helpers/Security.php");
include_once('core/autoloader.php');
include_once(__DIR__ . "/classes/User.php");

Security::onlyLoggedInUsers();



?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>users</title>
</head>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="images/default_profile.jpeg" alt="">
                    <div class="details">
                        <span><?php echo User::getUser($_SESSION['user'])["firstname"]; ?>  <?php echo User::getUser($_SESSION['user'])["lastname"]; ?></span>
                   
                        <p>Active now</p>
                    </div>
                </div>
                <a href="" class="logout">logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search">
                <button><i class="fa fa-search"></i></button>
            </div>

            <div class="users-list">
                <a href="">
                    <div class="content">
                        <img src="images/black.jpeg" alt="">
                        <div class="details">
                            <span>deedde</span>
                            <p>Test meaages</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fa fa-circle"></i></div>
                </a>
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>

</html>