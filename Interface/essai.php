<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- style -->
    <link rel="stylesheet" href="style.css">

    <title>Login & Registration Form</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                <form action="#">
                    <div class="input-field">
                    <input type="email" placeholder="Enter your email" required>
                    <i class="uil uil-envelope-alt"></i> 
                    </div>
                    <div class="input-field">
                    <input type="password" class="password" placeholder="Enter your password" required>
                    <i class="uil uil-key-skeleton-alt"></i>
                    </div>
                    <div class="input-field button">
                    <input type="submit" value="Login Now">
                    </div>
                </form> 

                <div class="login-signup">
                        <span class="text">Not a member?
                            <a href="#" class="text signup-link">Signup now</a>
                        </span>
                    </div>
            </div>
            <!-- Registration form -->
            <div class="form login">
                <span class="title">Registration</span>
                <form action="#">
                <div class="input-field">
                    <input type="text" placeholder="Enter your name" required>
                    <i class="uil uil-user"></i> 
                    </div>
                    <div class="input-field">
                    <input type="email" placeholder="Enter your email" required>
                    <i class="uil uil-envelope-alt"></i> 
                    </div>
                    <div class="input-field">
                    <input type="password" class="password" placeholder="Enter your password" required>
                    <i class="uil uil-key-skeleton-alt"></i>
                    </div>
                    <div class="input-field button">
                    <input type="submit" value="Login Now">
                    </div>
                </form> 

                <div class="login-signup">
                        <span class="text">Not a member?
                            <a href="#" class="text login-link">Signup now</a>
                        </span>
                    </div>
            </div>

        </div>
    </div>
     <script src="script.js"></script>
</body>
</html>