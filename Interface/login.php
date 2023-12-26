<?php
   session_start(); 
   
?> 
<!DOCTYPE html> 
<html> 
   <head> 
      <meta charset="utf-8" /> 
       <!-- icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <!-- style -->
    <link rel="stylesheet" href="sty.css">
    <link rel="stylesheet" href="assets/css/style.css">

   </head> 
   <body onLoad="document.fo.login.focus()" style="background-color:#4CAF50;"> 
   
   <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Authentication</span>
                <form action="serverCon.php" method="POST">
                    <div class="input-field">
                    <input type="email" name="email" placeholder="Enter your Email" required>
                    <i class="uil uil-envelope-alt"></i> 
                    </div>
                    <div class="input-field">
                    <input type="password" class="password" name="motdepasse" placeholder="Enter your password" required>
                    <i class="uil uil-key-skeleton-alt"></i>
                    </div>
                    <div class="input-field button">
                    <input type="submit" value="Se Connecter" name="SeConnecter" >
                    </div>
                </form> 

                <div class="login-signup">
                        <span class="text">Don't have an account yet?
                            <a href="signup.php" class="text signup-link" style="color:#4CAF50;">Sign up !</a>
                            <br>
                            <a href="MotPasse.php">Forgot Password ? </a>
                            <br>
                            <a href="index.php" class="text signup-link" style="color:#4CAF50;">Go Back!</a>
                        </span>
                    </div>
            </div> 
         </div>
         </div>
   </body> 
</html> 