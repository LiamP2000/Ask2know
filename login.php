<?php

include_once('core/autoloader.php');
include_once(__DIR__ . "/classes/User.php");
if (!empty($_POST)) {
    try {
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST["password"]);
        if ($user->canLogin()) {
            session_start();
            $_SESSION['user'] = $user->getEmail();
            header("Location:feed.php");
        }
    }catch (\Throwable $e){
        $error = $e->getMessage();
      

    }

}



?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Login</header>
            <form method= "post" action="">
                
                <div class="field input">
                    <label for="email">E-mailadress</label>
                    <input type="email" name="email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password">
                    <i class="fa fa-eye"></i>
                </div>
                
                <div class="field button">
                    <input type="submit" value="Submit">
                </div>

            </form>
            <div class="link">Not yet signed up?<a href="register.php"> Signup now</a></div>

        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
</body>

</html>