<?php
	include_once("./helpers/Security.help.php");
	if(Security::isLoggedIn()) {
		header('Location: home.php');
	}
    include_once("./classes/User.php");
	
	if( !empty($_POST) ) {
		$email = $_POST["email"];
		$password = $_POST["password"];
        try {
            $user = new User;
            $user->setEmail($email);
			$user->setPassword($password);
			$usr = $user->canLogin();
            if($usr) {
                session_start();
                $_SESSION['email'] = $user->getEmail();
				$_SESSION['id'] = $usr["id"];
                header("Location: home.php");
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
	}
    
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log in</title>
</head>
<body>
	<div id="header">
		<div class="logo"></div>
	</div>
	<div id="main">
		<h1>Log in</h1>
		<div class="loginfb"></div>
		<div class="linel"></div>
		<div class="liner"></div>
		<div id="form">
			<form method="post" action>
				<input name="email" placeholder="Email" type="email" required autofocus /><input name="password" placeholder="Password" type="password" required />
				<h5>Remember</h5>
				<input class="btn-toggle btn-toggle-round" id="btn-toggle-1" name="remember" type="checkbox" />
				<label for="btn-toggle-1"></label>
				<input name="login" type="submit" value="Log in" />
				<a href="reset.php">Forgot password?</a>
			</form>
		</div>
		
	</div>

	<?php if(isset($error)): ?>
		<div class="user-messages-area">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<ul>
					<li><?php echo($error);?></li>
				</ul>
			</div>
		</div>
	<?php endif; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <a href="register1.php" >
        <p class="">You're new here? <strong>Register</strong></p>
    </a>
    
</body>
</html>