<?php
session_start();
$Id=$_SESSION['user_id'];
include "connexion.php";

if(isset($_SESSION['user_id'])){
if(isset($_POST['Ajoute'])){
  
  if((!empty($_POST['Title']) || !empty($_POST['Domaine']) || !empty($_POST['Description']))  || !empty($_POST['Duration'])|| !empty($_POST['level'])){

        //Stoker les values dans des variables 

        $Id=$_SESSION['user_id'];
        $title = $_POST['Title'];
        $domaine = $_POST['Domaine'];
       $Description = $_POST['Description'];
         $level = $_POST['level'];
         $duree = $_POST['Duration'];
      //Upload L'image

         $nameImage = $_FILES['Image']['name'];
         $FolderImages = "images/". $_FILES['Image']['name'];
         $origine1 = $_FILES['Image']['tmp_name'];
         
       //select image extension
      
       $ImageType = strtolower(pathinfo($FolderImages,PATHINFO_EXTENSION));
       
       //Choisir les extensions accepter pour l'Images 
       
       $ImageExtensions = array("png","jpg","jpeg");
       
       if(in_array($ImageType,$ImageExtensions)){
         
         // Now let's move the uploaded image into the folder: images
         move_uploaded_file($origine1,$FolderImages);

        }
        do{
          $coursId = rand(1,10000);
          $id = $conn ->prepare('select id from cours where id = :id');
          $id -> bindValue(':id',$coursId,PDO::PARAM_INT);
          $exec = $id ->execute();
          $id = $id->fetch();
     }while($id);
     

     $req1 = $conn -> prepare('insert into cours (id,Titre,Date_Poster,Domaine,Description_C,image_cours,user_id,level,duree)
     values(:id,:Titre,NOW(),:Domaine,:Description_C,:image_cours,:user_id,:level,:duree)');
   
         //On liéè chaque variable à une valeur
   $req1 ->bindValue(':Titre',$title,PDO::PARAM_STR);
   $req1 ->bindValue(':Domaine',$domaine,PDO::PARAM_STR);
   $req1 ->bindValue(':Description_C',$Description,PDO::PARAM_STR);
   $req1 ->bindValue(':image_cours',$nameImage,PDO::PARAM_STR);
   $req1 -> bindValue(':id',$coursId,PDO::PARAM_INT);
   $req1 ->bindValue(':level',$level,PDO::PARAM_STR);
   $req1 ->bindValue(':duree',$duree,PDO::PARAM_INT);
   $req1 -> bindValue(':user_id',$Id,PDO::PARAM_INT);
       //Execute du requete
       $execute = $req1 ->execute();
      
        
            //Upload a video 
        $nameVideo = $_FILES['videos']['name'];
        $FolderVideos = "videos/". $_FILES['videos']['name'];
        $origine2 = $_FILES['videos']['tmp_name'];
        //select video type
        $VideoType = strtolower(pathinfo($FolderVideos,PATHINFO_EXTENSION));
        // les extentions accepter  pour les videos
        $VideoExtensions = array("mp4","mp4v","mov");
        //verifier l'extension du video 
        if(in_array($VideoType,$VideoExtensions) ){
          // Now let's move the uploaded video into the folder: videos
          move_uploaded_file($origine2,$FolderVideos);
        }

        $req2 = $conn -> prepare('insert into video (Type_v,Emplacement,cours_id) 
        values (:Type_v,:Emplacement,:cours_id)');
        //On liéè chaque variable à une valeur
        $req2 ->bindValue(':Type_v',$VideoType,PDO::PARAM_STR);
        $req2 ->bindValue(':Emplacement',$nameVideo,PDO::PARAM_STR);
        $req2 ->bindValue(':cours_id',$coursId,PDO::PARAM_INT); 
           //Execute du requete
         $res2 = $req2 ->execute();

         //upload a file
         
          $nameFile = $_FILES['file']['name'];
          $FolderFiles = "files/". $_FILES['file']['name'];
          $origine3 = $_FILES['file']['tmp_name'];
          
          //Select extension du file
          $FileType = strtolower(pathinfo($FolderFiles,PATHINFO_EXTENSION));
          
          //les extensions accepter pour les files 
          $FileExtensions = array("ppt","docx","pdf");
          
          if(in_array($FileType,$FileExtensions)){
            
            // Now let's move the uploaded file into the folder: files
          move_uploaded_file($origine3,$FolderFiles);
          
        }

        $req3 = $conn -> prepare('insert into support (Type_S,Emplacement,cours_id)
        values (:Type_S,:Emplacement,:cours_id)');
        
        //On liéè chaque variable à une valeur
        
        $req3 ->bindValue(':Type_S',$FileType,PDO::PARAM_STR);
        $req3 ->bindValue(':Emplacement',$nameFile,PDO::PARAM_STR);
        $req3 ->bindValue(':cours_id',$coursId,PDO::PARAM_INT); 
           //Execute du requete
 
           $res3 = $req3 ->execute();

         }
       }
       
    }
      if($res3 ){
    header('location:Ajout.php');
   }

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
    <title>Add Course</title>

</head>
<body>
  <div class="row py-3 m-auto">
    <span style="color:#5fcf80; font-size:10px;"><?php if(isset($msg)) echo $msg;  ?></span>
  </div>
<?php include "header_Formateur.php" ?>

<form method="post" action="AjouterCours.php" enctype="multipart/form-data" id="FormAj">
<div class="container">
  <div class="row mb-3 pt-1 d-sm-flex   align-items-center justify-content-center">
  <h3 class="text-center py-2" style="color:#5fcf80;">Add cours</h3>
    <div class="col-sm-3 py-1">
    <label for="inputText" class="form-label">Title</label>
      <input type="text" class="form-control" name="Title" id="inputText">
      <span id="sp1"></span>
    </div>
    
    <div class="col-sm-3 py-1">
    <label for="inputDomaine" class="form-label">Domaine</label>
      <input type="Text" class="form-control" id="inputDomaine" name="Domaine">
      <span id="sp2"></span>
  </div>
  
  <div class="row py-1 align-items-center justify-content-center">
      <div class="col-sm-6 ">
          <label for="FormControlTextarea" class="form-label">Description</label>
          <textarea class="form-control" id="FormControlTextarea" rows="3" name="Description" ></textarea>
          <br>
          <span id="sp3"></span>
      </div>
  </div>


  <div class="col-sm-3 ">
    <label for="inputText" class="form-label">Level</label>
      <input type="text" class="form-control" name="level" id="inputText">
      <span id="sp1"></span>
    </div>
    
    <div class="col-sm-3 ">
    <label for="inputDomaine" class="form-label">Duration(h) </label>
      <input type="Text" class="form-control" id="inputDomaine" name="Duration">
      <span id="sp2"></span>
  </div>
  
  <div class="row py-2 align-items-center justify-content-center">
       <div class="col-sm-6">
            <label for="formImage" class="form-label">Uploade Image </label> 
            <input type="file"  name="Image" id="image">
            <br>
            <span id="sp4">
         
              </span>
       </div>
 </div>
 <div class="row py-1 align-items-center justify-content-center">
       <div class="col-sm-6">
            <label for="formFile" class="form-label">Uploade file (pdf)
            </label>
            <input class="form-control" type="file" id="formFile" multiple name="file" accept="application/pdf">
            <br>
            <span id="sp5" >
           
            </span>
       </div>
 </div>
   
 <div class="row mb-3 align-items-center justify-content-center">
 <div class="col-sm-6">
            <label for="formVideo" class="form-label">Uploade video</label>
            <input class="form-control" type="file" id="formVideo" multiple name="videos">
            <br>
            <span id="sp6" >
            
            </span>
       </div>
 </div>
 
 <div class="row  d-flex align-items-center justify-content-center py-1">
     <div class="col-sm-4  ml-5 pl-5">
  <button type="submit" class="btn ml-5" style="border:3px solid #5fcf80; color:white; background-color:#5fcf80; border-raduis:6px; margin-left:35px;" name="Ajoute">ADD</button>
  </div>
  </div>

</form>
<script src="Error.js"></script>
</body>
</html>
 
