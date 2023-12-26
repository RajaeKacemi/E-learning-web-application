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

$sql = "UPDATE counter SET visit=visit+1 WHERE id = 2";
$result = mysqli_query($conn,$sql);
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>About - Learn Center</title>
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


</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>About Us</h2>
        <p>We envision a world where anyone, anywhere, has the power to transform their lives through learning. </p>
      </div>
     </div>
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="images/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>Learn center is the online training system you xell love very much</h3>
            <p >
            We are your unique resource for all things online learning. We offer a wide range
             learning opportunities ranging from courses available for free download to exercises and tests to take for free.<br/><br/>
             Learn Center offers the full range of personalized eLearning services from scratch, including:
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Increasing access to quality education for all, everywhere,</li>
              <li><i class="bi bi-check-circle"></i> Improving teaching and learning on campus and online.</li>
              <li><i class="bi bi-check-circle"></i> Advancing teaching and learning through research.</li>
            </ul>
            <p>
            Learn Center is the global e-learning platform that offers everyone, anywhere, the opportunity to change their learning lives .
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

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