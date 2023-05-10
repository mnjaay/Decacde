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


//controle de saisit 
if(isset($_POST['nbr']) && isset($_POST['date'] )){
   $nbr = $_POST['nbr'];
   $date = $_POST['date'];
   $valeur = 450;
   $nc = $nbr*$valeur;
}

  



////recuperation de la connexion a la base de donnee;

///ecrire la requete
$query = "INSERT INTO petidej (NCPetDej,PUPetitDej,ValeurPetitDej,date) VALUES ('$nbr','$valeur','$nc','$date')";
/////preparation de la rquete
$statement = $connexion->prepare($query);
//executer la requete
//$data = [$nbr,$nc,$valeur,$date];
$statement->execute();   

//var_dump($data);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title></title>
</head>
<body>

<?php include('entete.php') ?>
<div class="form">
<form class=""  method="post">

<div class="container mt-5">
        <h3>Ajouter Nombre Couvert Petit Dejener</h3> <br>
    
            
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Date</label>
            <input type="date" class="form-control" id="" name="date" required>
         </div>
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre Couvert</label>
            <input type="text" class="form-control" id="" name="nbr" required>
         </div>
         <div class="mb-3">
             <button class="btn btn-primary" type="submit" >Ajouter</button>
         </div>
 
</form>
     
</div>
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>