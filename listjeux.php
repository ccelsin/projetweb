<?php
    $titre = "Liste des jeux";
    include("header.inc.php");
?>

<div class="container">
<h1>Liste des jeux</h1>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Categorie</th>
      <th scope="col">Regles</th>
      <th scope="col">Images</th>
    <tr>
      
  </thead>
  <tbody>
  
  <?php

// Connexion :
require_once("datacon.php");
$req="SELECT * FROM jeu";
$ps=$pdo->prepare($req);
$ps->execute();



  while($row=$ps->fetch()) 
  {     
    echo '<tr>';     
    echo'<td>'.$row['nom'].'</td>';
    echo'<td>'.$row['categorie'].'</td>';
    echo'<td><a href="'.$row['regle'].'">uno.pdf</a></td>';
    echo '<td><img src="'.$row['images'].'" style="width:100px; height:100px;"></td>';
    echo '</tr>';
}

?>

</tbody>

</table>

</div>
<?php
   // include 'footer.inc.php';
?>
