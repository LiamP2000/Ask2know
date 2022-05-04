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

    <form action="register2.php" method="post">
        <label for="company">Company</label>
        <input type="text" name="company" id="company">
        <label for="password">Password company</label>
        <input type="password" name="passwordC" id="passwordC">
        <input type="submit" value="Continue">
    </form>

    <a href="login.php">
        <p>Already have an account? <strong>Login</strong></p>
    </a>
    
</body>
</html>