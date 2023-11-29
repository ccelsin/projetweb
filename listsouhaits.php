<?php
     session_start();
   $titre = "Liste des souhaits";
    include("header.inc.php");
    require_once("role_membre.php");
  
?>

<div class="container">
<h1>Liste des souhaits</h1>



<table id="dataTable" class="table">
  <thead>
    <tr>
    <th scope="col">Images</th>
      <th scope="col">Nom</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Date</th>
      <th scope="col">Début</th>
      <th scope="col">Fin</th>
      <th scope="col">Statut</th>
    <tr>
      
  </thead>
  <tbody>
  
  <?php

// Connexion :
require_once("datacon.php");
$membre= $_SESSION['PROFILE']['id'];


// Exécuter la requête SQL pour récupérer les données
$req= "SELECT * FROM souhaits JOIN creneaux ON (id_creneaux = id) JOIN 
jeu ON  ON (jeu=id) WHERE id = '$membre';";
$resultat = mysqli_query($conn, $sql);
$ps=$pdo->prepare($req);
$ps->execute();




  while($row=$ps->fetch()) 
  {     
    echo '<tr>'; 
    echo '<td><img src="'.$row['images'].'" style="width:100px; height:100px;"></td>';
    echo'<td>'.$row['nom'].'</td>';
    echo'<td>'.$row['categorie'].'</td>';
  
}

?>

</tbody>

</table>

</div>
<?php
   //include 'footer.inc.php';
?>
