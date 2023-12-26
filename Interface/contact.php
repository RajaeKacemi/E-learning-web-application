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

$sql = "UPDATE counter SET visit=visit+1 WHERE id = 3";
$result = mysqli_query($conn,$sql);
}

}
?>



<?php 
 
if (isset($_POST['submit'])){
    require_once 'mail.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $msg = $_POST['message'];
  $mail->setFrom($email, $name);
  
    $mail->addAddress('learncenter03@gmail.com');
    $mail->Subject = $subject;
    $mail->Body    = $msg;
    $mail->send();
    if($mail->send()){
     $sucess = "Your message has been sent. Thank you!";
    }
   

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact - LEARN CENTER</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
 

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
  <link href="../Apprenant/styleHeader.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>
  <main id="main">

   <!-- ======= Breadcrumbs ======= -->
   <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact Us</h2>
        <h5> We are here to help you !</h5>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.3060646949752!2d-7.658695085351035!3d33.54542338074685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62cd8f02b714f%3A0xe46a3bdd517247c9!2sFacult%C3%A9%20des%20sciences%20A%C3%AFn-Chock!5e0!3m2!1sfr!2sma!4v1591792959251!5m2!1sfr!2sma' frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Faculté des sciences, CASABLANCA, MAROC</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>learncenter03@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+212 612345678</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="contact.php" method="post" role="form" >
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading"></div>
                <div class="error-message"></div>
                <div class="sent-message"><?php if(isset($sucess)) echo $sucess; unset($succes); ?></div>
              </div>
              <div class="text-center"><button type="submit" name="submit" style="background-color:#5fcf80;color:white;font-size:23px; border:white solid;border-radius:12px;">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
              <strong>Email:</strong> learncenter03@gmail.com<br>
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
         
          Designed by <a href="http://www.fsac.ac.ma/front/index.php">FSAC</a>
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