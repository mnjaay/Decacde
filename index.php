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
  // echo "connexion reussi";
    
  
   }catch(PDOException $e){
    echo "Erreur"+$e->getMessage();
   }
     //la requete
     $sql = "select * from petidej order by date desc limit 10";
     ///preparation de la requete les donnees sur le Petit dej
     $statement = $connexion-> query($sql);
     ///execution 
     $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);

      //la requete pour recuperer les donner sur le dejener
      $sql1 = "select * from dej  order by date desc limit 10";
      ///preparation de la requete
      $statement = $connexion-> query($sql1);
      ///execution 
      $resultat1 = $statement->fetchAll(PDO::FETCH_ASSOC);

      //la requete pour recuperer les donner sur le diner
      $sql2 = "select * from diner  order by date desc limit 10";
      ///preparation de la requete
      $statement = $connexion-> query($sql2);
      ///execution 
      $resultat2 = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="sty.css">
   
   
    <title>Gestion de DECADE</title>
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div id="entete" class="container-fluid">
    <a class="navbar-brand" href="#">
    <div>
    <div>
    <img src="pPlQ_khM_400x400-removebg-preview.png" alt="Logo" width="70" height="60" class="d-inline-block align-text-top">
      </div>  
      <div>
      <p style="font-size: 27px;">Gestion de DECADE</p>
      </div>  

    </div>  
    
      
        
    </a>
  </div>
</nav>

    <div class="body">
        <!-- Choix de l'utilisateur-->
        <div class="choix">

                <nav class="nav flex-column">
                    <a class="nav-link active" style="color:white;font-size:20px" aria-current="page" href="#">Accueil</a>
                    <a class="nav-link active" style="color:white;font-size:20px" aria-current="page" href="#">Ajouter</a>
                    <a class="nav-link active" style="color:white;font-size:20px" aria-current="page" href="#">Ajouter</a>
                    <a class="nav-link active" style="color:white;font-size:20px" aria-current="page" href="#">Evolution</a>
              
                
                </nav>

        </div>
        <!-- Tableau de decade-->
       
         <div class="tab">
        
         <div class="table_petitD">
            <h5>Petit Dejener</h5>
    <table class="table table-light">
   
  <thead>
 
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Nomb.Couvert</th>
     
      <th scope="col">Valeur</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($resultat as $values):?>
    <tr>
    <th scope="row"><?php echo $values['date']?></th>
      <td><?php echo $values['NCPetDej']?></td>
      <td><?php echo $values['ValeurPetitDej']?></td>
      <td>
   <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>     
   <a href="suppPetitDej.php?id=<?=$values['id_PetDej']?>"><button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a> 
       </td>
    </tr>
    
    <?php endforeach;?>
  </tbody>

</table>

<a href="AjoutPetitDej.php"><button id="bouton" type="submit" class="btn btn-success"> Ajouter Petit Dejener+</button></a>
    </div>
   
    <div class="table_dejener">
    <h5> Dejener</h5>
    <table class="table table-light">
 
  <thead>
    <tr>
      
      <th scope="col">Nombre de Couvert</th>
  
      <th scope="col">Valeur</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($resultat1 as $values):?>
  <tr>
  
      <td><?php echo $values['NCDej']?></td>
      <td><?php echo $values['ValeurDej']?></td>
      <td><button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
      <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
      </td>
   
    </tr>
    <tr>
    </tr>
    <?php endforeach;?>
  </tbody>

</table>


<a href="AjouterDej.php"><button id="bouton" type="submit" class="btn btn-success">Ajouter Dejener+</button></a>
    </div>
    <div class="table_diner">
    <h5>Diner</h5>
    <table class="table table-light">
  
  <thead>
    <tr>
  
      <th scope="col">Nombre de Couvert</th>
      <th scope="col">Valeur</th>
    </tr>
  </thead>
  <?php foreach ($resultat2 as $values):?>
  <tbody>
  <tr>
  
      <td><?php echo $values['NCDiner']?></td>
      <td><?php echo $values['ValeurDiner']?></td>
      <td><button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
          <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
      </td>
    
    </tr>
    <tr>
    </tr>
    <?php endforeach;?>
  </tbody>

</table>
<button id="bouton" type="button" class="btn btn-success">Ajouter Diner+</button>
    </div>
   </div>
 </div>
 
 
       

   <script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>