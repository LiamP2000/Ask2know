<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h1>Register</h1>

    <form action="topics.php" method="post">
        <label for="email">E-mailadress</label>
        <input type="text" name="email" id="email">
        <label for="firstname">First name</label>
        <input type="text" name="firstname" id="firstname">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="password">Confirm password</label>
        <input type="password" name="confirmPassword" id="confirmPassword">
        <input type="submit" value="Register">
    </form>

    <a href="register1.php">
        <p>Already have an account? <strong>Login</strong></p>
    </a>
    
</body>
</html>