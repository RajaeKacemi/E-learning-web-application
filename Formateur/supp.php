<?php
session_start();
$username=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
<link href="style1.css" rel="stylesheet">
    <title>Lesson added successfully</title>
</head>
<body>
    <?php include "header_Formateur.php"; ?>

        <style>

.card
{
    position: relative;
    top:100px;
    padding:10px;
}
a,a:hover
{
    text-decoration: none;
    color: white;
}
body
{
    background: url('reviewback.jpg') no-repeat;
   
    
}
button{
    font-size:18px;
}
</style>
<?php 
echo"<center class='pt-5 mt-5'>"; 
    echo "<div class='card text-white bg-success mb-3' style='max-width: 18rem;'>
    <div class='card-header'>Lesson Deleted successfully!</div><div class='card-body'>
    <h5 class='card-title'>Thank You, ".$username."</h5>
    <button class='btn-secondary'><a href='MyCourses.php'>Continue</button></div></div>";
    echo "</center>"; 
 

  ?>
  
</body>
</html>