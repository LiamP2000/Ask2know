<!DOCTYPE html>
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
                <div class="error-txt">This is an error message</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">Firstname</label>
                        <input type="text" placeholder="First name">
                    </div>
                    <div class="field input">
                        <label for="">Lastname</label>
                        <input type="text" placeholder="Last name">
                    </div>

                </div>
                <div class="field input">
                    <label for="">Email adress</label>
                    <input type="text" placeholder="Email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="text" placeholder="Password">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field input">
                    <label for="">Confirmation password</label>
                    <input type="text" placeholder="Password">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Select image</label>
                    <input type="file" >
                </div>
                <div class="field button">
                    <input type="submit" value="Submit">
                </div>

            </form>
            <div class="link">Already signed up <a href="">Login now</a></div>

        </section>
    </div>
</body>

</html>