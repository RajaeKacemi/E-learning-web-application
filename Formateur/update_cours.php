
<?php
error_reporting(-1);
include "connexion.php";

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
<link href="assets/css/style.css" rel="stylesheet">

  <link href="style1.css" rel="stylesheet">
<title>Modifier cours</title>
</head>
<body>

<?php include "header_Formateur.php" ?>

<form method="post" action="#" enctype="multipart/form-data">
<div class="container py-5 ">
  <div class="row mb-3 pt-5 d-sm-flex   align-items-center justify-content-center">
  <h3 class="text-center py-2" style="color:#5fcf80;">Edit cours</h3>
    <div class="col-sm-3 py-1">
    <label for="inputText" class="form-label">Title</label>
    <input type="hidden" class="form-control" name="idCours" id="inputText" value="<?= $cours['id']?>"  DISABLED>
      <input type="text" class="form-control" name="Title" id="inputText" value="<?= $cours['Titre']?>"  DISABLED>
      <span id="sp1"></span>
    </div>
    <div class="col-sm-3 py-1">
    <label for="inputDomaine" class="form-label">Domaine</label>
      <input type="Text" class="form-control" id="inputDomaine" name="Domaine" value="<?= $cours['Domaine']?>"  DISABLED>
  </div>
  <div class="row py-1 align-items-center justify-content-center">
      <div class="col-sm-6">
          <label for="FormControlTextarea" class="form-label">Description</label>
          <textarea class="form-control" id="FormControlTextarea" rows="3" name="update_Description" placeholder="<?= $cours['Description_C']?>" required></textarea>
      </div>
  </div>
  <div class="row py-1 align-items-center justify-content-center">
         <div class="col-sm-3 ">
    <label for="inputText" class="form-label">Level</label>
      <input type="text" class="form-control" name="level_update" id="inputText">
     
    </div>
    
    <div class="col-sm-3">
    <label for="inputDomaine" class="form-label">Duration(h) </label>
      <input type="Text" class="form-control" id="inputDomaine" name="Duration_update">
  </div>
</div>
  <?php
  
   if(isset($_POST['modifier'])){
      include "connexion.php";
        if((!empty($_POST['update_Description'])) && isset($_POST['update_Description'])&&isset($_POST['level_update'])&& isset($_POST['Duration_update'])){

          $statment = $conn -> prepare('update cours set Description_C =:Description_C,level=:level,duree=:duree where id = :id_cours  LIMIT 1');
          $statment ->bindValue(":Description_C",$_POST['update_Description'],PDO::PARAM_STR);
          $statment ->bindValue(":level",$_POST['level_update'],PDO::PARAM_STR);
          $statment ->bindValue(":duree",$_POST['Duration_update'],PDO::PARAM_STR);
          $statment ->bindValue(":id_cours",$cours['id'],PDO::PARAM_INT);
          $statment ->execute();
          
          if($statment ->execute()){
            header('location:edit.php');
          }
        }
      
      }
     
   ?>
  <div class="row mb-3 align-items-center justify-content-center">
       <div class="col-sm-6">
         <p> Image : </P>
       <img src="images/<?= $cours['Image_cours'] ?>" class="img-fluid " style="height:10%; width:60%;">
            <br>
          <span id="sp4"></span>
       </div>
 </div>
 <div class="row mb-3 align-items-center justify-content-center">
       <div class="col-sm-6  ">
           <label for="formFile" class="form-label">Uploade new file </label>
         <input class="form-control" type="file" id="formFile" multiple name="update_file" accept="application/pdf" required>   
            </div>
       
 </div>
 <?php
 error_reporting(-1);
 if(isset($_POST['modifier'])){
      include "connexion.php";
    
        $nameFile_update = $_FILES['update_file']['name'];
        $Folder_files_update = "files/". $_FILES['update_file']['name'];
        $origine = $_FILES['update_file']['tmp_name'];
        //Select extension du file
          $FileType_update = strtolower(pathinfo($Folder_files_update,PATHINFO_EXTENSION));
          //les extensions accepter pour les files 
          $FileExtensions = array("pdf");
          if(in_array($FileType_update,$FileExtensions)){
            // Now let's move the uploaded file into the folder: files
          move_uploaded_file($origine,$Folder_files_update);
          }
          $statment = $conn -> prepare('update support set Type_S = :Type_S,Emplacement = :Emplacement where cours_id = :id_cours LIMIT 1');
        $statment ->bindValue(":Type_S",$FileType_update,PDO::PARAM_STR);
        $statment ->bindValue(":Emplacement",$nameFile_update,PDO::PARAM_STR);
        $statment ->bindValue(":id_cours",$cours['id'],PDO::PARAM_INT);
        $statment ->execute();
        }
   ?>
 <div class="row mb-3 d-flex align-items-center justify-content-center py-3">
   <div class="col-sm-6">
     <label for="formVideo" class="form-label">Uploade new video</label>
     <input class="form-control" type="file" id="formVideo" multiple name="update_videos" value="" required>
    </div>
 </div>
 
 <?php
 error_reporting(-1);
 if(isset($_POST['modifier'])){
      include "connexion.php";
      
          //Upload un video 
          $nameVideo_update = $_FILES['update_videos']['name'];
          $FolderVideos_update = "videos/". $_FILES['update_videos']['name'];
          $origine = $_FILES['update_videos']['tmp_name'];
          //select video type
          $VideoType_update = strtolower(pathinfo($FolderVideos_update,PATHINFO_EXTENSION));
          // les extentions accepter  pour les videos
          $VideoExtensions_update = array("mp4","mp4v","mov");
          //verifier l'extension du video 
          if(in_array($VideoType_update,$VideoExtensions_update) ){
            // Now let's move the uploaded video into the folder: videos
            move_uploaded_file($origine,$FolderVideos_update);
          }
        $statment = $conn -> prepare('update video set Type_v = :Type_v,Emplacement = :Emplacement where cours_id = :id_cours  LIMIT 1');
        $statment ->bindValue(":Type_v",$VideoType_update,PDO::PARAM_STR);
        $statment ->bindValue(":Emplacement",$nameVideo_update,PDO::PARAM_STR);
        $statment ->bindValue(":id_cours",$cours['id'],PDO::PARAM_INT);
        $statment ->execute();
       
   }
   ?>
 <div class="row align-items-center justify-content-center py-1">
     <div class="col-sm-4 ml-5 pl-5">
  <input type="submit" class="btn ml-5" id="submit" style="border:3px solid #5fcf80; color:white;background-color:#5fcf80;margin-left:35%; a:hover {
  color:#5fcf80; background-color:white;}"
   value="Edit" name="modifier" onclick="Message()"></input>
  </div>
  </div>
</form>
</body>
</html>

<?php  ?>