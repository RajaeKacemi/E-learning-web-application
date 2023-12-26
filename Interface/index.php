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

$sql = "UPDATE counter SET visit=visit+1 WHERE id = 0";
$result = mysqli_query($conn,$sql);
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LEARN CENTER</title>
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

  <?php include "header.php"; ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      
      <a href="login.php" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

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

    
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Learn Center?</h3>
              <p>
              At Learn Center, we are intrinsically forward-looking and, together with our partners, we are continually creating the future.
               On the occasion of our first step, we take a moment to recognize where we want to go, what we want to accomplish and,
               in doing so, we are truly celebrating the path we want to travel.
              </p>
              <div class="text-center">
                <a href="about.php" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Become a trainer </h4>
                    <p>Our trainers around the world teach classes to millions of participants at Learn Center. We offer you the tools and skills to teach what you love.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Be mentored by the best professionals</h4>
                    <p>Here you will have the chance to learn from the best of the best. Our trainers are very knowledgeable and have a lot to teach!</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Your future, our priority</h4>
                    <p>Participants from all over the world embark on new careers, progress in their field and enrich their lives.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
   

    

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>E-LEARNING</h3>
            <p>
              
              CASABLANCA<br>
              MAROC <br><br>
              <strong>Phone:</strong> +212 612345678<br>
              <strong>Email:</strong> LearnCenter@gmail.com<br>
            </p>
          </div>


         

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Learn Center</span></strong>. All Rights Reserved
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