<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>

    .card
    {
        position: relative;
        top:100px;
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
</style>

<body>
<?php
if(isset($_GET['username']))
{
$username=$_GET["username"];
$comment=$_GET["comment"];


if($username=="" || $comment=="")
{
  echo"<center>"; 
        echo "<div class='card text-white bg-danger mb-3' style='max-width: 18rem;'><div class='card-header'>Suggestion could not be sent!</div><div class='card-body'><h5 class='card-title'>Username or Suggestion is empty!</h5><p class='card-text'>All inputs are requires to send suggestions! </p>&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn-secondary'><a href='http://localhost/Elearning/ProfileUser/userratingpage.php'>Go Back!</a></button></div></div>";
        echo "</center>"; 

}
else
{
    
if($_SERVER['REQUEST_METHOD']=="GET")//con establish
{
$localhost = "localhost";
$usernamew = "root";
$passwordw = "";
$db = "db_elearning";
$conn = mysqli_connect($localhost,$usernamew,$passwordw,$db);
if(!$conn){
echo "";
}
else
{
echo "";
}
    $result=mysqli_query($conn,"select username from utilisateur where username='$username'")
				or die("FAILED!!".mysql_error());
	$row=mysqli_fetch_array($result);
      if($row['username']!=$username)
    {
        
		echo"<center>"; 
        echo "<div class='card text-white bg-danger mb-3' style='max-width: 18rem;'><div class='card-header'>Suggestion could not be sent!</div><div class='card-body'><h5 class='card-title'>Username is incorrect!</h5><p class='card-text'>Only account holders can give suggestions! </p>&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn-secondary'><a href='http://localhost/Elearning/ProfileUser/userratingpage.php'>Go Back!</a></button></div></div>";
        echo "</center>"; 
    }
    else if($row['username']==$username )
    {
   
        $reviewtime= date("m/d/y G.i:s<br>", time());
		$sql = "insert into reviewtable values('$username','$comment','$reviewtime')";
        $result = mysqli_query($conn,$sql);
		echo"<center>"; 
        echo "<div class='card text-white bg-success mb-3' style='max-width: 18rem;'><div class='card-header'>Suggestion Submitted!</div><div class='card-body'><h5 class='card-title'>Thank You,".$username."</h5><p class='card-text'>We appreciate you for taking out your valueable time for us </p><button class='btn-secondary'><a href='http://localhost/Elearning/ProfileUser/profile.php'>Continue</button></div></div>";
        echo "</center>"; 
    }
	

  
}}}
?>
</body>