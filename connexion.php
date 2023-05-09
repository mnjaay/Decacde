<?php 

$servername="localhost";
$dbname="restaurant";
$username="root";
$password="";

$connexion = null; //Supprimer toutes les connexion antereireur
   try{

    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //   echo "connexion reussi";
    
  
   }catch(PDOException $e){
    echo "Erreur"+$e->getMessage();
   }
?>