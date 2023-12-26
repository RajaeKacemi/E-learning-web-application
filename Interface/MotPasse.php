<?php
   session_start(); 
include "config.php";
if(isset($_POST['submit'])){
    $Email = $_POST['email'];
$statemanet =$conn->prepare("select * from utilisateur where Email = '$Email'"); 
$statemanet ->execute();
if($res=$statemanet ->fetch()>0){

    header('location:mp.php');


}else{
    $msg = "Incorrect email ";
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
                <span class="title ">Reset password</span>
                <form action="" method="POST">
                    <div class="input-field">
                    <input type="email" name="email" placeholder="Enter your Email" required>
                    <i class="uil uil-envelope-alt"></i> 
                    </div>
                    <div class="input-field button">
                    <input type="submit" value="Continue" name="submit" >
                    </div>
                </form> 

                <div class="login-signup">
                        <span class="text">
                            <a href="login.php" class="text signup-link" style="color:#4CAF50;">it's not your account?</a>
                            <br>
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

<?php
unset($msg);
?>