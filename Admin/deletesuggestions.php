<?php
    
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


		$sql = "delete  from  reviewtable ";
        $result = mysqli_query($conn,$sql);
        //echo "message sent!";
        echo "all suggesions deleted";
     
  
}
?>