<?php
error_reporting(-1);
//
$db_NSD="mysql:host=localhost;dbname=db_elearning";
$db_user="root";
$db_Password ="";
try{

    $conn = new PDO($db_NSD,$db_user,$db_Password);
  
    ///echo "connection avec succès";

}catch(Exception $e){
echo 'Error :' . $e -> getMessage();

}

