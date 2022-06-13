<?php

include_once('core/autoloader.php');

if(!empty($_POST)){
    try {
        include_once(__DIR__ . "/classes/User.php");
       
        // create a new user object
        $user = new User();

        // use setters to fill in data for this user
        $user->setEmail($_POST['email']);
        $user->setPassword(($_POST['password']));
        $user->setFirstname($_POST['firstname']);
        $user->setLastname(($_POST['lastname']));
        $user->setCompany($_POST['company']);
    

        // register the user by executing a query in the database
        $user->register();
        
        // start a session and redirect the user to feed.php
        session_start();
        $_SESSION['user'] = $user->getEmail();
        header("Location: feed.php");
    }
    catch(Throwable $error) {
        // if any errors are thrown in the class, they can be caught here
        $error = $error->getMessage();
        echo "halalooo";
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
    <title>Register</title>
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Register</header>
            <form method="post" action="">
            <?php if(isset($error)): ?>
                <div class="error-txt"><?php echo $error; ?></div>
                <?php endif; ?>
                <div class="name-details">
                    <div class="field input">
                        <label for="firstname">First name</label>
                        <input type="firstname" name="firstname"required>
                    </div>
                    <div class="field input">
                        <label for="lastname">Last name</label>
                        <input type="lastname" name="lastname" required>
                    </div>

                </div>
                <div class="field input">
                    <label for="email">E-mailadress</label>
                    <input type="email" name="email" required>
                </div>
                <div class="field input">
                    <label for="company">Company password</label>
                    <input type="text" name="company" placeholder="enter company code" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="enter new password" required>
                    <i class="fa fa-eye"></i>
                </div>
          
                <div class="field image">
                    <label for="">Upload profile picture</label>
                    <input type="file" >
                </div>
                <div class="field button">
                    <input type="submit" value="Submit">
                </div>

            </form>
            <div class="link">Already signed up? <a href="login.php">Login</a></div>

        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>

</html>