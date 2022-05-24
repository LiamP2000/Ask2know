<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./styles/styles.css"> 
    <title>Home</title>
</head>
<body>
<?php include_once(__DIR__ . "/includes/nav.inc.php"); ?>

    <div>  
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="help.php">Help</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="messages.php">Messages</a></li>
        </ul>    
    </div>
    


    <h1>Hello [name]</h1>
    <p>Maybe you can help with these issues?</p>

    <div>
        <p><strong>[name]</strong></p>
        <p>[date]</p>
        <p>[issue]</p>
        <p>[amount of comments]</p>
        <button class="btn" >see more</button> <!-- detail.php? -->
    </div>

    <h2>Message from the company</h2>

    
</body>
</html>