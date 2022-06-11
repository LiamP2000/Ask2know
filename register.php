<?php


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
            <form action="">
                <!--<div class="error-txt">This is an error message</div>-->
                <div class="name-details">
                    <div class="field input">
                        <label for="">First name</label>
                        <input type="text">
                    </div>
                    <div class="field input">
                        <label for="">Last name</label>
                        <input type="text">
                    </div>

                </div>
                <div class="field input">
                    <label for="">E-mailadress</label>
                    <input type="text">
                </div>
                <div class="field input">
                    <label for="">Company password</label>
                    <input type="text">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field input">
                    <label for="">Confirmation password</label>
                    <input type="password">
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
</body>

</html>