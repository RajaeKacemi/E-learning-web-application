<?php 

if($_SERVER['REQUEST_METHOD']=="GET"){
  $localhost = "localhost";
  $usernamew = "root";
  $passwordw = "";
  $db = "db_elearning";
 $conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
 if(!$conn){
  echo "Connection error";
  }
    else{

$sql = "UPDATE counter SET visit=visit+1 WHERE id = 1";
$result = mysqli_query($conn,$sql);
}

}
?>
<?php

include "../Formateur/connexion.php";
  
// preparer la requete  

$requete= $conn -> prepare('select * from cours');


//execution de la requete

$execute = $requete -> execute();

//Recuperation du $resultat

$resultat = $requete -> fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Courses - LEARN CENTER</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.7.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>

  <main id="main" data-aos="fade-in">

  <div class="breadcrumbs">
      <div class="container">
        <h2>Courses</h2>
        <p>We envision a world where anyone, anywhere, has the power to transform their lives through learning.
 </p>
      </div>
    </div>

    <!-- ======= Courses Section ======= -->
         

    <section id="courses" class="courses">
    <div class="container ">
      
      <div class="row d-flex">
              <!--         Courses           -->
                    <?php foreach($resultat as $res): ?>
                     
             <div class="col-sm-4 px-3 py-2">
                      <div class="col-sm-12 col-md-12  d-flex align-items-stretch" >
                          <div class="course-item ">
                            <img src="../Formateur/images/<?= $res['Image_cours'] ?>" class="img-fluid " style="height:35%; width:100%;">
                             <div class="course-content">
                              <div class="d-flex justify-content-between align-items-center py-2">
                               <h4><?= $res['Domaine'] ?></h4>
                               </div>
                             <h3><a href="../Interface/course-details.php?NumCours=<?=$res['id']?>"><?= $res['Titre'] ?></a></h3>
                              <p><?= $res['Description_C'] ?></p>
                            <p>Date poster: <?= $res['Date_Poster']?></p> 
                            </div>
                  <?php  
                     $idFormateur = $res['user_id'];                
                    //la 3 eme pour recuperer les infos des formateurs d'apres la table utilisateur
                      $req2 = $conn ->prepare("SELECT * from utilisateur where id = '$idFormateur'");
                        $req2 ->execute();
                      $res2 = $req2 ->fetch();
                            ?>  
                          <div class="trainer">
                            <div class="trainer-profile d-flex  align-items-center px-3">
                              <img src="../Interface/images/<?= $res2['Photo_Profil'];?>" style="height:40px;" class="img-fluid" alt="">
                              <span><?=  $res2['Nom'] ." " .$res2['Prenom'] ;?></span>
                               </div>
                               </div>

                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                     
                     
            </div>
               
            </div>
    
 </div> 
  </section>



   <!-- End Courses Section -->

  

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
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="http://www.fsac.ac.ma/front/index.html">FSAC</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>