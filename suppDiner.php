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
  //echo "connexion reussi";

   
  
   }catch(PDOException $e){
    echo "Erreur"+$e->getMessage();
   }

   if(isset( $_GET['id_diner']))
{
    $get_id_Din = $_GET['id_diner'];
 
     //la requete
      $sql = "DELETE from diner where id_diner=$get_id_Din";
      $statement = $connexion-> query($sql);
      $statement->execute();

}
      header('location:index.php');
      exit; 

?>