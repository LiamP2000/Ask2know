<?php
    include_once("./helpers/Security.help.php");
    include_once("./helpers/Cleaner.help.php");
    if (Security::isLoggedIn()) {
        header('Location: home.php');
    }
    include_once(__DIR__ . "/classes/User.php");

    if (!empty($_POST)) {
      $email = $_POST["email"];
      $username = $_POST["username"];
      $password = $_POST["password"];
      $password_conf = $_POST["password_conf"];
      $password_comp = $_POST["password_comp"];
      
      if ($password === $password_conf) {
          try {
            $user = new User();
            
            // use setters to fill in data for this user
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setCompanyCode($password_comp);
            $user->register();
            session_start();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['id'] = $id;
            header("Location: home.php");
            
          } catch (Throwable $error) {
              // if any errors are thrown in the class, they can be caught here
              $error = $error->getMessage();
          }
      } else {
          $error = "The passwords don't match";
      }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/styles.css">
  <title>Dezine</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
</head>

<body class="container">


  <main>
    <?php if (isset($error)) : ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> class="form form--register">
    <h2>register</h2>
      <div class="form__field">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control register--email" id="exampleInputEmail1"
          aria-describedby="emailHelp" required>
        <div class="message message--email"></div>
      </div>

      <div class="form__field">
        <label for="exampleInputUsername1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control register--username" id="exampleInputUsername1" required>
        <div class="message message--username"></div>
      </div>

      <div class="form__field">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
        <div id="passwordHelp" class="form-text">Passwords must be at least 6 characters long</div>
      </div>

      <div class="form__field">
        <label for="password_conf" class="form-label">Password confirmation</label>
        <input type="password" name="password_conf" class="form-control" id="password_conf" required>
        <div id="passwordHelp" class="form-text">Passwords must match password above</div>
      </div>

      <div class="form__field">
        <label for="password_comp" class="form-label">Password confirmation</label>
        <input type="password" name="password_comp" class="form-control" id="password_comp" required>
        <div id="passwordHelp" class="form-text">Fill in special number company</div>
      </div>

      <button type="submit" class="btn primary__btn">Sign me up</button>
    </form>

    <div class="form__register__relink">
			<a href="login.php">
				<p class="">Already an acount? <strong>Login</strong></p>
			</a>
		</div>


  </main>
 
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
</body>

</html>