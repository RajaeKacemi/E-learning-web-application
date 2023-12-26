<?php
 
 include 'config.php';


     if(isset($_POST['signup'])){
        $Unom = mysqli_real_escape_string($conn, $_POST['nom']);
        $Uprenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $Username = mysqli_real_escape_string($conn, $_POST['username']);
        $Urole = mysqli_real_escape_string($conn, $_POST['role']);
        $Uemail=mysqli_real_escape_string($conn, $_POST['email']);
        $Umotdepasse =htmlspecialchars_decode( mysqli_real_escape_string($conn,$_POST['motdepasse']),ENT_QUOTES);

        if(empty($Unom) || empty($Urole)|| empty($Uemail)|| empty($Umotdepasse) || empty($Uprenom)|| empty($Username)){
         echo 'Veuillez remplir tous les champs' ; 
         }else{
        //  $sql = "insert into 'Authentification' ('nom','role','email','motdepasse') values('$Unom','$Urole','$Uemail','$Umotdepasse')";
        //  $result = mysqli_query($con,$sql);
      
        $photo='avatar-1577909_960_720.png';
        $query = "INSERT INTO `utilisateur` (`Nom`,`Prenom`,`Username`,`Email`,`LeRole`,`MotPasse`,`Photo_Profil`) 
        VALUES ('$Unom','$Uprenom','$Username','$Uemail','$Urole','$Umotdepasse','$photo')";
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