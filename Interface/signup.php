<?php 
   session_start(); 
?> 

<?php
 include 'config.php';

     if(isset($_POST['signup'])){
        $Unom = mysqli_real_escape_string($conn, $_POST['nom']);
        $Uprenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $Username = mysqli_real_escape_string($conn, $_POST['username']);
        $Urole = mysqli_real_escape_string($conn, $_POST['role']);
        $Uemail=mysqli_real_escape_string($conn, $_POST['email']);
        $Umotdepasse =htmlspecialchars_decode( mysqli_real_escape_string($conn,$_POST['motdepasse']),ENT_QUOTES);
        $key='rajaa';
        $char='1272726412345678';
        $motdepasseEncrypt=openssl_encrypt($Umotdepasse,'aes-128-cbc',$key,0,$char);
        if(empty($Unom) || empty($Urole)|| empty($Uemail)|| empty($Umotdepasse) || empty($Uprenom)|| empty($Username)){
         echo 'Veuillez remplir tous les champs' ; 
         }
         // verifier si le nom est entre 5 et 10 caracteres.
         if (!preg_match('/^([a-zA-Z]{5,10})$/', $Unom))
         {
         $Invalid[]="5 to 10 letters";
         
         }
         // verifier email
         $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
         if(!preg_match($regex, $Uemail)){
                    $Invalid[] = 'invalid email';
         }
        
        if(!empty($Unom) || !empty($Urole)|| !empty($Uemail)|| !empty($Umotdepasse) || !empty($Uprenom)|| !empty($Username)){
        $photo='avatar-1577909_960_720.png';
        $query = "INSERT INTO `utilisateur` (`Nom`,`Prenom`,`Username`,`Email`,`LeRole`,`MotPasse`,`Photo_Profil`) 
        VALUES ('$Unom','$Uprenom','$Username','$Uemail','$Urole','$motdepasseEncrypt','$photo')";
        $query_run = mysqli_query($conn,$query);
         if($query_run){
             echo 'Vous vous etes inscrit ';
             header('Location:login.php');
         }
         else{
             echo 'Une erreur sest produite';
         }
     }
     }
     
?>
<!DOCTYPE html> 
<html> 
   <head> 
      <meta charset="utf-8" /> 
      <!-- icons -->
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
      <!-- bootstrap -->
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
       
                <span class="title pt-2">Registration</span>
                <form id="formS" action="" method="POST">
                    
                <?php
        if(isset($Invalid)){
            foreach($Invalid as $Invalid){
               echo '<div class="Invalid">'.$Invalid.'</div>';
            }
         }
      ?>
                <div class="d-flex flex-row justify-content-around">
                <div class="input-field nom">
                    <span><?php if(isset($InvalidLName)) echo $InvalidLName;   ?></span>
                    <input type="text" name="nom" id="nm" placeholder="Last name" required>
                    <i class="uil uil-user"></i> 
                </div>
                
                <div class="input-field">
                    <input type="text" name="prenom" placeholder="First name" required>
                    <i class="uil uil-user"></i> 
                </div>
                     </div>

                <div class="input-field">
                    <input type="text" name="username" placeholder="Username" required  >
                    <i class="uil uil-user"></i> 
                </div>

                 <div class="d-flex flex-row ">

                <div class="input-field mr-3">
                    <label for="Professeur">Trainer</label>
                <input type="radio" id="Professeur" name="role" value="Formateur" style="width:20%; margin-left:6px;" >
                  </div>

                   <div class="input-field ">
                    <label for="Etudiant">Learner</label>             
                  <input type="radio" id="Etudiant" name="role" value="Apprenant" style="width:20%;margin-left:6px;">
                   </div>

               </div>

                    <div class="input-field">
                        <input type="email" name="email" placeholder="Entre your email"  required>
                      
                    <i class="uil uil-envelope-alt"></i> 
                    </div>

                    <div class="input-field">
                    <span class="py-1"></span>
                    <input type="password" name="motdepasse" placeholder="Entre your password" value="" min="8" required>
                    <i class="uil uil-key-skeleton-alt"></i>
                    </div>

                    <div class="input-field button">
                    <input type="submit"  name="signup" value="To regester">
                    </div>
                </form> 
                <div class="login-signup">
                        <span class="text">Already have an account?
                            <a href="login.php" class="text login-link" style="color:#4CAF50;" >Log in</a>
                            <br>
                            <a href="index.php" class="text signup-link" style="color:#4CAF50;">Go Back!</a>
                        </span>
                    </div>
            </div>
        </div>
   </div>
   <script src="input.js"></script>
   </body> 
</html>
