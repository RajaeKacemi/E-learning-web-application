<?php
   session_start(); 
   $role =$_SESSION['role'];
   $userL= $_SESSION['user_name'];
   $userF=$_SESSION['user_firstName'];
   $userU=$_SESSION['username'];
include "config.php";
if(isset($_POST['password'])){
require_once 'mail.php';
$code = rand(1,1000);
$name = 'learn Center';
$email = 'learncenter03@gmail.com';
$subject = 'learn Center - Reset password';
$msg = "Hello <br>". $res['Nom']." ". $res['Prenom'] ."Your code : " . $code;
$mail->setFrom($email, $name);
$mail->addAddress($Email);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->send();
if($mail->send()){
    $mssg = "Entre code";
}
}
?> 
<!DOCTYPE html> 
<html> 
   <head> 
      <meta charset="utf-8" /> 
       <!-- icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- style -->
    <link rel="stylesheet" href="sty.css">
    <link rel="stylesheet" href="assets/css/style.css">

   </head> 
   <body onLoad="document.fo.login.focus()" style="background-color:#4CAF50;"> 
   
   <div class="container">
        <div class="forms">
            <div class="form login">
            <h4 class="center py-3 px-3 mx-5 text-danger"><?php if(isset($msg)) echo $msg; unset($msg);  ?></h4>
                <span class="title ">Reset password</span><br>
                <span class="py-2" style="color:#444">Hello <strong><?php if($role == "Apprenant"){ echo $userU;}else{ echo $userL . " " . $userF; } ?></strong>, we will help you recover the password. We have sent you a code in your email</span>
                <form action="" method="POST">
                <div class="input-field">
                    <input type="text" name="email" placeholder="Enter code" required>
                    <i class="uil uil-envelope-alt"></i> 
                    <span class="py-2"><?php if(isset($mssg)) echo $msgg ; unset($mssg);  ?></span>
                    </div>
                    <div class="input-field button">
                    <input type="submit" value="Send me code" name="password" >
                    </div>
                </form> 

                <div class="login-signup">
                        <span class="text">
                            <a href="index.php" class="text signup-link" style="color:#4CAF50;">Go back !!</a>
                        </span>
                    </div>
            </div> 
            <div>
                
            </div>
         </div>
         </div>
   </body> 
</html> 

