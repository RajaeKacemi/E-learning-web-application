<?php
session_start();

$role = $_SESSION['role'];

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LearnCenter</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
  

   .modal-header
    {
        background-color:#5FCF80;
        
    }

    a,a:hover
    {
        text-decoration: none;
        color:black;
    }
     .mybutton {
  border-radius: 20px;
  background-color: #5FCF80;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 10px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.mybutton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.mybutton span:after {
  content: '\2605';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.mybutton:hover span {
  padding-right: 25px;
}

.mybutton:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<style>
.slidecontainer {
    
    line-height: 30px;
    font-family: serif;
    font-size: 20px;
    color:gray;
    border-radius: 10%;
    background: white;
    margin-left:50px;
    margin-right:50px;
}

.slider {
    -webkit-appearance: none;
    width: 50%;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}
    .utitle
    {
        font-size: 30px;
        font-weight: bolder;
        color: white;
        background-color: #5FCF80;
        height:70px;
        text-align: center;
        padding-top: 15px;
        
        
    }
    #userrating
    {
        border: 0.5px solid grey;
       
        width:800px;
        border-top: 0px solid white;
    }
    #userrating:hover
    {
         box-shadow: 0 10px 10px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
    }
    body
    {
       
    }
    @media screen and (max-width: 1000px) 
    {
    #userrating{width:auto;}
           
     }
</style>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="../Interface/assets/css/style.css" rel="stylesheet">
<link href="assets/css/styleCourses.css" rel="stylesheet">
<link rel="stylesheet" href="../Apprenant/styleHeader.css" class="href">
</head>
<body>
    
</body>
</html>

<!-- ======= Header ======= -->
<?php  if($role==="Formateur"){include "../Formateur/header_Formateur.php";}else{include "../Apprenant/headerA.php";} ?>
<!-- End Header -->
<center>
    <br><br><br><br><br><br><br><br>
<form action="userratingdb.php" method="get" id="userrating">
    <div class="utitle">USER RATING</div>
    <br>
<div class="slidecontainer">
 UserInterface<input type="range" min="1" max="10" value="5" class="slider" id="myRange" name="ui"><br>
 Performance<input type="range" min="1" max="10" value="5" class="slider" id="myRange" name="performance"><br>
 Design <input type="range" min="1" max="10" value="5" class="slider" id="myRange" name="design"><br>
 Usability<input type="range" min="1" max="10" value="5" class="slider" id="myRange" name="usablity"><br>
<button class="mybutton" type="submit"><span>Rate Us</span></button>
    
</div>
</form>
</center> 
<br>
<footer id="footer" class="footer">
<div class="container text-center">

      <h3>Suggestions Are Welcomed</h3>

      <form class="mc-trial row" action="review.php" method="GET">
        <div class="form-group col-md-3 col-md-offset-2 col-sm-4">
          <div class=" controls">
            <input name="username" placeholder="Enter Your Username " class="form-control" type="text">
          </div>
        </div>
        <!-- End email input -->
        <div class="form-group col-md-3 col-sm-4">
          <div class=" controls">
            <input name="comment" placeholder="Enter Your Suggestion" class="form-control" type="text">
          </div>
        </div>
        <!-- End email input -->
  <div class="col-md-2 col-sm-4">
    <p>
       <button name="submit" type="submit" class="btn btn-block btn-submit">
            Suggest this! <i class="fa fa-arrow-right"></i></button>
          </p>
        </div>
        </footer>
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
    </div>
  </footer>
      <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>