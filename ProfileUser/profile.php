<?php
session_start();
include '../Interface/config.php';
$user_id = $_SESSION['user_id'];
$role =$_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PROFILE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <link href="../Interface/assets/css/style.css" rel="stylesheet">
  
</head>
<body>
<?php
if($role==="Formateur"){
  include "../Formateur/header_Formateur.php";
}else if($role==="Apprenant"){
  include "../Apprenant/headerA.php";

}
  
  ?>
  <br><br><br>
  <div class="container1">

   <div class="profile">
      <?php
      
         $select = mysqli_query($conn, "SELECT * FROM `utilisateur` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
            
          }
            
            if($fetch['Photo_Profil'] == ''){
              echo '<img src="../Interface/images/avatar-1577909_960_720.png">';
            }else{
              echo '<img src="../Interface/images/'.$fetch['Photo_Profil'].'">';
            }
          
            ?>
      <h3><?php echo $fetch['Username']; ?></h3>
      <a href="update_profile.php" class="btn1">update profile</a>
      <a href="userratingpage.php" class="btn1">Rate us!</a>
      <a href="chat2.php" class="btn1">Chat with Admin</a>
 
   </div>

</div>

</body>
</html>