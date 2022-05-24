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
    
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap link gone due to merge conflict -->
	<link rel="stylesheet" href="./styles/styles.css">
	<title>Log in</title>
</head>

<body>
	<!--<div id="header">
		<div class="logo"></div>
	</div>-->
	<main>
		
		<div class="loginfb"></div>
		<div class="linel"></div>
		<div class="liner"></div>

		<form method="post" action class="form form--profile">
			<h2>login</h2>
			<div class="form__field">
				<label for="email" class="form-label">Email adress</label>
				<input name="email" class="form-control" placeholder="Email" type="email" required autofocus />
			</div>
			<div class="form__field">
				<label for="password" class="form-label">Email adress</label>
				<input name="password" class="form-control" placeholder="Password" type="password" required />
			</div>

			<div class="form__submit">
				<button type="submit" class="btn secondary__btn secondary__btn-signup">Login</button>
				<a href="reset.php" class="btn secondary__btn-reverse secondary__btn-signup">Forgot password?</a>
			</div>
		</form>
		<div class="form__register__relink">
			<a href="register.php">
				<p class="">You're new here? <strong>Register</strong></p>
			</a>
		</div>
	</main>


	</div>

	<?php if(isset($error)): ?>
	<div class="user-messages-area">
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
					aria-hidden="true">&times;</span></button>
			<ul>
				<li><?php echo($error);?></li>
			</ul>
		</div>
	</div>
	<?php endif; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



</body>

</html>