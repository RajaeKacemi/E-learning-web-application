<?php
  session_start();
  $id = $_SESSION['user_id'];
  $role =$_SESSION['role'];
  error_reporting(-1);
  if(!(isset($_SESSION['user_id']))){
    header('location:login.php');
  }else{
  
  include "../Formateur/connexion.php";
 
  if(isset($_GET['NumCommentaire']) && isset($_GET['NumCours'])){
 
    $req = $conn ->prepare('DELETE FROM commentaire WHERE id = :num LIMIT 1');
    
    $req ->bindValue(':num',$_GET['NumCommentaire'],PDO::PARAM_INT);
    
    //Execution du requete
    
  $res = $req->execute();   
  $req = $conn -> prepare('SELECT * FROM cours WHERE id = :num LIMIT 1');
    
    $req ->bindValue(':num',$_GET['NumCours'],PDO::PARAM_INT);
    $res = $req->execute();
    
    $cours = $req ->fetch();
}
if(isset($_GET['NumCUser']) && isset($_GET['NumCours']) ){
  $userComm = $_GET['NumCUser'];
  $statment = $conn -> prepare("SELECT Nom,Prenom,Username,LeRole FROM utilisateur WHERE id = '$userComm'");
  $statment -> execute();
  $result = $statment ->fetch();
  $FirstN = $result['Prenom'];
  $LastN = $result['Nom'];
  $userN = $result['Username'];  
  $ROLE = $result['LeRole'];


  $req = $conn -> prepare('SELECT * FROM cours WHERE id = :num LIMIT 1');
    
  $req ->bindValue(':num',$_GET['NumCours'],PDO::PARAM_INT);
  $res = $req->execute();
  
  $cours = $req ->fetch();

}

}
  if(isset($_GET['NumCours'])){
  
    $req = $conn -> prepare('SELECT * FROM cours WHERE id = :num LIMIT 1');
    
    $req ->bindValue(':num',$_GET['NumCours'],PDO::PARAM_INT);
    $res = $req->execute();
    
    $cours = $req ->fetch();
  
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php  echo $cours['Titre']; ?></title>
  <li class="" style="color:#444;"nk href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/6b6914703d.js" crossorigin="anonymous"></script>
<!-- Template Main CSS File -->
<link href="../Interface/assets/css/style.css" rel="stylesheet">
<link href="../Formateur/assets/css/styleCourses.css" rel="stylesheet">

</head>
<body>
    <!-- ======= header ======= -->
   <?php if($role==="Formateur"){
  include "../Formateur/header_Formateur.php";
}else if($role==="Apprenant"){
  include "../Apprenant/headerA.php";

}  
?>
       <div class="row-sm-12 titre pt-5 mt-5">

       <div class="row px-3">
           <p  class="px-4"><a href="index-apres.php" class="chemin ">Home</a><span> > <span><a href="index-apres.php" class="chemin">My Courses</a><span> > <span>learn <?php  echo $cours['Titre']; ?></p>
       </div>

       <div class="row py-3 px-5">
       <div class="container">
       <h1 class="px-5"> Learn  <?php  echo $cours['Domaine'] . " with " . $cours['Titre']; ?><h1>    
       </div>

      <div class="row px-5">
        <ul class="listUl d-flex mx-4">
          <li class="list p-2"><i class="fa-solid fa-clock px-1"></i><span><?php echo $cours['duree'] . "Hours"; ?> <span></li>
          <li class="list p-2"><i class="fa-solid fa-chart-simple px-1"></i><span><?php echo $cours['level'] ; ?><span></li>
        </ul>
      </div>
      </div>
</div>
       <div class="container">
    <div class="d-flex flex-row-reverse p-3 ">
         <p>Last update on <?php  echo $cours['Date_Poster']; ?></p>
       </div>
       <div class="row-sm-6 d-flex">
         <div class="col-sm-8 ">
        <h1 class="py-2" style="color:#444;"><?php  echo " Learn " . $cours['Titre']; ?></h1>
         <?php
 
     if(isset($_GET['NumCours'])){

    $req = $conn -> prepare('SELECT * FROM video WHERE cours_id = :num ');
  
    $req ->bindValue(':num',$_GET['NumCours'],PDO::PARAM_INT);
    $res = $req->execute();
  
     $video = $req ->fetch();

     $stat = $conn -> prepare('SELECT * FROM support WHERE cours_id = :num ');
  
     $stat ->bindValue(':num',$_GET['NumCours'],PDO::PARAM_INT);
     $res = $stat->execute();
   
      $file = $stat ->fetch();
               }
                ?>
                <div class="col-sm-12 py-2 mx-5">
            <video src="../Formateur/videos/<?php  echo $video['Emplacement']; ?>" controls  width="100%" height="80%" ;height:60%;></video>
            </div>
            <hr>
            <div class="col-sm-12 py-2 mx-5">
            <embed src="../Formateur/files/<?php  echo $file['Emplacement']; ?>" type='application/pdf' width='100%' height='500px'/>
            </div>
         </div>


        </div>
        
        <hr>
      </div>
      
    </div>
       <div class="row-sm-12 mt-1 mx-5 px-3">
         <div class="col-sm-8 py-3">
 
         <div class="row-sm-8 py-3">
         <h3>comments:</h3>
         <h5 style="color:#5fcf80;">write a comment : </h5>
     <form action="" method="post">
    <textarea name="comm" id="commentaire" cols="90" rows="3">
      <?php if(isset($LastN) && isset($FirstN) && isset($userN)){
        
       if($ROLE==="Formateur"){
        echo '@'.$LastN.' '.$FirstN;
        if(!empty($LastN) && !empty($FirstN) && !empty($userN)){
          unset($LastN,$FirstN,$userN);
          }
        
      }else {
      echo '@'.$userN;
        if(!empty($LastN) && !empty($FirstN) && !empty($userN)){
          unset($LastN,$FirstN,$userN);
          }
         }} 
       
        ?>
    </textarea>
    <input type="submit" name="commentaire" value="Envoyer Commentaire">
     </form>
     </div>
         <?php
        
        if(isset($_GET['NumCours'])){
        $req = $conn -> prepare('SELECT * FROM cours WHERE id = :num LIMIT 1');
        $idC = htmlspecialchars($_GET['NumCours']);
        $req ->bindValue(':num',$idC,PDO::PARAM_INT);
        $res = $req->execute();
        $cours = $req ->fetch();
        
        
         if(isset($_POST['commentaire'])){
          if(isset($_POST['comm']) && !empty($_POST['comm'])){
                  $CoursId = $cours['id'];
                  $text = $_POST['comm'];
            $statment1 = $conn ->prepare("insert into commentaire (text_C,user_id,Date,cours_id) values ('$text','$id',NOW(),'$CoursId')");
             $statment1 ->execute();
          }  
         } 
              //***************Afichage du commentaire ****************//

                $CoursId = $cours['id'];
                 //la 2 eme pour recuperer les commentaire du course
                 $state = $conn -> prepare("select * from commentaire  where cours_id='$CoursId' order by Date desc");
                 $state ->execute();
                 while($row = $state ->fetch()){
                   $user = $row['user_id'];
                   //la 3 eme pour recuperer les infos des user qui ont commenter dans ce cours 
                   $req2 = $conn ->prepare("SELECT * from utilisateur where id = '$user'");
                   $req2 ->execute();
                    while( $res2 = $req2 ->fetch()){
                   
?>
                  <!-- L'affichage du commentaires avec une boucle foreach-->
     
        <div class="sm-8 mt-2 py-2" style="">
        <div class="row-sm-6 p-2 d-flex gx-1 align-items-stretch">

        <div class="col-sm-2 justify-content-center">
          <img src="../Interface/images/<?= $res2['Photo_Profil'];?>" style="height:55px; border-radius: 50%;" class="img-fluid" alt="">
        </div>
          <?php $r = $res2['LeRole']; ?>
        <div class="col-sm-6 ">
            <span  style="color:#5fcf80; font-size:25px;"> <?php if($r ==="Apprenant"){ echo $res2['Username']; } 
            else if($r === "Formateur") {echo $res2['Nom']." ".$res2['Prenom'];}; ?>
            </span><br>
            <span style="color:#444; font-size:12px;">Le <?= $row['Date'];?> </span>
            <p class="para"><?= $row['text_C'];?></p>
       
        </div>
        <?php if($id == $user){   ?>
        <div class="col-sm-4 px-2 d-flex align-items-end">  
          <a href="course-details.php?NumCommentaire=<?=$row['id']?>&& NumCours=<?=$_GET['NumCours']?>" class="p-1"><i class="fa-solid fa-trash "></i>Supprimer</a>
        </div>
        <?php }  ?>
        <?php if($id != $user){   ?>
          <div class="col-sm-4 px-2 d-flex align-items-end">  
        <a href="course-details.php?NumCUser=<?=$row['user_id']?> && NumCours=<?=$_GET['NumCours'] ?>">Repondre</a>
      </div>
      <?php } ?>
     
      </div>
    </div>
    <hr>
         <?php }}  ?>
 
        

    </div>
          
        </div>
        </div>
            <!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>LEARN CENTER</h3>
        <p>
          
          CASABLANCA,<br>
          MAROC <br><br>
          <strong>Phone:</strong> +212 612345678<br>
          <strong>Email:</strong> learncenter@gmail.com<br>
        </p>
      </div>

      
    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>LEARN CENTER</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
     
      Designed by <a href="http://www.fsac.ac.ma/front/index.html">FSAC</a>
    </div>
  </div>
</div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-up"></i></a>
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

    
 <!-- Template Main JS File -->
 <script src="assets/js/main.js"></script>


  </body>
  
  </html>

<?php

        }
        ?>



