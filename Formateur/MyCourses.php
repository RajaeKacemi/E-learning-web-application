
<?php
error_reporting(-1);
session_start();
$id=$_SESSION['user_id'];  
include "connexion.php";

if(isset($_GET['NumCours'])){

    $req = $conn ->prepare('DELETE FROM cours WHERE id = :num LIMIT 1');
    
    $req ->bindValue(':num',$_GET['NumCours'],PDO::PARAM_INT);
    
    //Execution du requete
    
  $res = $req->execute();   
  if($res){
    header('location:supp.php');
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My Courses</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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

  
</head>

<body>
    <!-- ======= header ======= -->
    <?php include "header_Formateur.php" ?>
    <section id="courses" class="courses">
    <div class="container mt-5">
      <div class="row d-flex ">
              <!--         Courses           -->
         <?php

//recuperer tous les ids des courses  du formateur 
  
  $requete= $conn -> prepare("select * from cours where user_id = '$id'");
  
  $requete -> execute();
  
                while($res = $requete->fetch()){
          ?>
                      <div class="col-sm-4 pt-4  px-3 ">
                      <div class="col-lg-12 col-md-12 d-flex align-items-stretch"  >
                          <div class="course-item">
                            <img src="images/<?= $res['Image_cours'] ?>" class="img-fluid " style="height:50%; width:100%;">
                             <div class="course-content">
                              <div class="d-flex justify-content-between align-items-center mb-1">
                               <h4><?= $res['Domaine'] ?></h4>
                               </div>
                               <div class="mb-5">
                             <h3><a href="../Interface/course-details.php?NumCours=<?=$res['id']?>"><?= $res['Titre'] ?></a></h3>
                              <p><?= $res['Description_C'] ?></p>
                              <p>Date poster: <?= $res['Date_Poster']?></p>
                              <a href="MyCourses.php?NumCours=<?=$res['id']?>" class="p-1"><i class="fa-solid fa-trash "></i>DELETE</a>
                              <a href="update_cours.php?NumCours=<?=$res['id']?>" class="p-1"><i class="fa-solid fa-arrows-rotate"></i>EDIT</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
        
                      <?php }; ?>
                   
                   </div>

               <div class="row py-3 ">
                <div class="col-sm-12  d-flex  justify-content-center align-items-center">
             <a href="AjouterCours.php" style="border:3px solid #5fcf80 ;color:#4CAF50; margin-left:35px;" class="p-3" id="ajout">Add Cours</a>
               </div>
               
                </div>
    
 </div> 
                    </section>

                    <script src="assets/js/main.js"></script>
</body>
</html>


