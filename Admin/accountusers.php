<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<center><h1>Account Users</h1></center><hr>

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}
.cont
    {
        width:100%;
        text-align: center;
    }
.cont-head
    {
        width:100%;
        font-weight: bolder;
        text-align: center;
    }
td
    {
        width:15%;
        text-align: center;
    }


</style>
<?php
  $host = 'localhost';
  $dbname = 'db_elearning';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT nom,prenom,email,id FROM utilisateur";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  } 
?>

 <table class='cont-head''> 
    <thead>
     <tr>
       <th>Nom</th>
       <th>Prénom</th>
       <th>Email</th>
       <th>Option</th>
     </tr>
    </thead>
   <table class='cont table table-hover table-dark'>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['nom']); ?></td>
       <td><?php echo htmlspecialchars($row['prenom']); ?></td>
       <td><?php echo htmlspecialchars($row['email']); ?></td>
       <td><button><a href="desactiver.php?id=<?php echo $row["id"]; ?>" >Supprimer</a></button></td>
     </tr>
     <?php endwhile; ?>
     <hr></table> 
 </table>
</body>
</html>