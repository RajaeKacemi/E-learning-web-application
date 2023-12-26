<?php
session_start();
$user_id = $_SESSION['user_id'];
$role =$_SESSION['role'];
include "../Formateur/connexion.php";

if(isset($_POST['search'])){
     $titre=$_POST['search'];
     $domaine=$_POST['search'];
    $statment = $conn->prepare( "select * from cours where Titre='$titre' or Domaine ='$domaine'");
    $statment ->execute();
    $resultat =$statment ->fetchAll();
  
?>
 
 <?php include "headerA.php"; ?>
 <div class="breadcrumbs">
  <div class="container mt-1">
    <h2>Courses</h2>
    <p>Nous envisageons un monde où n’importe qui, n’importe où, a le pouvoir de transformer sa vie par l’apprentissage. </p>
  </div>
</div>
<div class="col-sm-6 mx-5 mt-4">
  <h3 style="color:#444;">Search results : </h3>
</div>
        <section id="courses" class="courses">
        <div class="container ">
          
          <div class="row d-flex">
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
    


<?php
    }
    ?>



