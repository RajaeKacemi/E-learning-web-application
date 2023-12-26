<?php 
include 'config.php';
session_start();

if(isset($_POST['SeConnecter'])){
        $Uemail = mysqli_real_escape_string($conn,  $_POST['email']);
        $Umotdepasse = mysqli_real_escape_string($conn, $_POST['motdepasse']);
        $key='rajaa';
        $char='1272726412345678';
       
        $query = "SELECT * FROM utilisateur where Email = '$Uemail'" ;
        $res = mysqli_query($conn, $query) or die('query failed'); 
        if(mysqli_num_rows($res) > 0){
          $row = mysqli_fetch_assoc($res);
          $mp = $row['MotPasse'];
          $motPasse=openssl_decrypt($mp,'aes-128-cbc',$key,0,$char);
        if($Umotdepasse==$motPasse){
           
        $_SESSION['user_id']=$row['id'];
        $_SESSION['user_name']=$row['Nom'];
        $_SESSION['user_email']=$row['Email'];
        $_SESSION['user_firstName']=$row['Prenom'];
        $_SESSION['username']=$row['Username'];
        $_SESSION['role']=$row['LeRole'];
        $id=$row['id'];
        $query = "SELECT * FROM utilisateur where id='$id' ";
        $res = mysqli_query($conn, $query) or die('query failed');
        $row = mysqli_fetch_assoc($res);
        $role=$row['LeRole'];
        if($role=='Formateur'){
          header('Location: ../Formateur/MyCourses.php');
          
        }else if($role=='Apprenant'){
          header('Location: ../Apprenant/CoursesApprenant.php');
        }else{
          header('Location: ../Admin/admin.php');
        }
      
      }else{
        echo "<SCRIPT> 
        alert('Adresse email ou mot de passe incorrect!')
        window.location.replace('http://localhost/Elearning/Interface/login.php');
              </SCRIPT>";
      }
  } 
else{ 
       echo "<SCRIPT> 
       alert('Adresse email ou mot de passe incorrect!')
       window.location.replace('http://localhost/Elearning/Interface/login.php');
             </SCRIPT>";
    }}
?>